<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/13
 * Time: 4:24 PM
 */

class RedisBase
{
    /**
     *

     * redis的list底层实现是：ziplist or linked list or quick list
     * redis的set底层实现：当元素全为整数并且个数少于512时为整数集合，否则为字典
     * redis的zset底层实现: 当元素个数小于128个并且总长度小于64byte用ziplist， 否则用skiplist，键值存储键为值，值存储的是分数
     * redis的hash底层实现: 所有元素的key 和 value长度都小于64byte, 使用ziplist, 否则使用hashTable

    1、redis基本类型 5个基础类型   HyperLogLog、Geo、Pub/Sub   BitMap(支持按bit存储，可以实现BloomFilter)等(加分)
    string : 用作缓存；做计数器；set get mget（获取多个key）
    hash：使用场景较少；可以存储对象(但是不能嵌套对象，使用情况比较单一，使用场景较少)(hmset、hget、hgetall、hdel、hexists、)
    list：可以用于做粉丝列表、评论列表等，还可以做简单的队列，lpush && rpop    LPUSH、LPOP(BLPOP)、LRANGE key start end
    set：无序合集，自动去重，获取两个集合的交集(sinter key1, key2)、差集(sdiff key1, key2)啥的效率不错(sadd  scard  smembers key)
    zset: 有序集合，自动根据分数排序，如排行榜，按点赞数、浏览量等，根据分数默认排序（zadd、zrange）
    2、redis  和mc的区别
    mc : 缺点
    // key不能超过256字节，key的最大失效时间是30天
    // 单个value不能超过1m
    // 只支持kv形式，不支持持久化和主从同步

    优点：
    // 多线程异步IO，可以利用多核
    Redis：
    特点：单线程 俩原因   a、非阻塞异步事件处理函机制
    b、缓存数据基于内存，io操作不会耗时太长，避免上下文切换消耗cpu性能
    支持持久化，支持主从同步，不仅支持k-v，还支持list、set、hash、zset等多种数据格式

    3、redis的分布式锁（setnx、set）
    4、查找指定key(keys、scan)
    5、做异步队列 (队列 lpop、rpush)
    6、redis持久化
    rbd   : 周期性同步	适合冷备份  持久化过程：
    aof	：记录操作日志append_only 类似mysql的binlog		适合热备份
    二者的工作方式，优缺点：

    7、7呢?

    8、缓存雪崩、缓存穿透、缓存击穿的区别、解决方式

    缓存雪崩指短时间内大量redis的key失效，导致大量请求直接落到db上，db压力过高直接瘫痪
    // 在key的过期时间上加上一些随机值，使key的过期相对分散，不要过于集中

    缓存穿透：查询的数据缓存、db都不存在，如攻击，查询id<0的数据，大量请求全部打到db上导致服务挂掉
    // 攻击可能性更大些，在接口层校验用户权限；对基本的查询数据做校验，eg：id < 0
    // 程序开发中不信任任何人的提交，做校验；翻分页查询大小限制等等…
    // 不存在的数据也设置缓存 key => null, 过期时间设置稍微短一些
    // 网关层 nginx让运维配置，每秒访问超过阈值的ip 拉黑等等…
    // 布隆过滤器 bloom filter ？ 存在性检测BloomFilter中不存在，则一定不存在

    缓存击穿：某一个key是热点的key，承载着很大的请求，这个key失效了，然后大量的请求打到db上，gg
    // 解决：永不过期？

    9、redis为什么这么快？
    // 官方100000+qps
    完全基于内存，绝大部分请求是纯内存操作，SO fast
    不存在多进程或是线程的切换消耗cpu;
    不存在加锁释放锁的操作，也不存在死锁而导致的性能消耗
    什么多路I/o, 非阻塞io，sorry， 不懂

    10、redis集群高可用的方式？	哨兵集群
    redis支持主从同步，cluster集群部署，通过哨兵监控redis主服务器的状态，若主服务器挂掉，将根据一定策略选出新主，然后将其他slave到新主节点
    选主策略：
    a、slave的priority设置的越低，其优先级越高
    b、a相同的情况下，复制的数据越多，优先级越高
    c、b相同的情况下， runid 越小越容易被选中 // ？？？
    不问别提，水平不够
    哨兵的作用:
    集群监控：负责监控 Redis master 和 slave 进程是否正常工作。
    消息通知：如果某个 Redis 实例有故障，那么哨兵负责发送消息作为报警通知给管理员。
    故障转移：如果 master node 挂掉了，会自动转移到 slave node 上。
    配置中心：如果故障转移发生了，通知 client 客户端新的 master 地址。

    11、为什么读写分离？为什么主从同步？如何同步？
    主节点负责写，从节点负责读，读写分离=>高效
    主从同步，灾备！数据安全！地球爆炸，凉凉
    从节点slave如果是第一次链接master会触发全量机制，master会fork一个子进程去生成rdb文件，并将在该过程中的写操作保存在内存的buffer中(别问这是为啥，要不生成rdb过程总的那些操作不就丢失了？从节点不就没同步全？)，slave将rdb文件数据写入本地磁盘，并加载到内存，然后同步master记录的缓存命令

    12、内存淘汰机制？
    allkeys-lru：在所有key中尝试回收最少使用的key，让新的key有空间存储
    volatile-lru：在过期的key中尝试回收最少使用的key，让新的key有空间存储
    过期策略：定期删除+惰性删除

    lru？手写lru？

    13、经典的kv、db读写模式：
    读先读缓存，有则返回；无则查库，返回并更新缓存
    更新的时候更新db，删除缓存
    // 更新db删除缓存而不更新缓存，没必要更新数据就更新缓存(或许特定场景可能会需要), 有可能某一字段短时间内修改几十次，但是基本没怎么读，更新缓存的话就存在大量冷数据，删除的话如果用得到再去缓存，开销降低



     */
}