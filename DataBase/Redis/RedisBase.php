<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/13
 * Time: 4:24 PM
 */

class RedisBase
{
    /** redis数据结构的底层存储形式 */ // todo 有待查资料考证
    # redis的list底层实现是：ziplist or linked list or quick list
    # redis的set底层实现：当元素全为整数并且个数少于512时为整数集合，否则为字典
    # redis的zset底层实现: 当元素个数小于128个并且总长度小于64byte用ziplist， 否则用skiplist，键值存储键为值，值存储的是分数
    # redis的hash底层实现: 所有元素的key 和 value长度都小于64byte, 使用ziplist, 否则使用hashTable

    /** redis基本类型 5个基础类型 */
    # HyperLogLog、Geo、Pub/Sub   BitMap(支持按bit存储，可以实现BloomFilter)等(加分)
    # string : 用作缓存；做计数器；set get mget（获取多个key）
    # hash：使用场景较少；可以存储对象(但是不能嵌套对象，使用情况比较单一，使用场景较少)(hmset、hget、hgetall、hdel、hexists、)
    # list：可以用于做粉丝列表、评论列表等，还可以做简单的队列，lpush && rpop    LPUSH、LPOP(BLPOP)、LRANGE key start end
    # set：无序合集，自动去重，获取两个集合的交集(sinter key1, key2)、差集(sdiff key1, key2)啥的效率不错(sadd  scard  smembers key)
    # zset: 有序集合，自动根据分数排序，如排行榜，按点赞数、浏览量等，根据分数默认排序（zadd、zrange）

    /** redis 和 mc 的区别 */
    # mc : 缺点
    # key不能超过256字节，key的最大失效时间是30天
    # redis单个value可以达到512M，mc不能超过1m
    # 只支持kv形式，不支持持久化和主从同步, 纯内存存储

    # 优点：
    # 多线程异步IO，可以利用多核
    # redis
    # a、非阻塞异步事件处理函机制
    # 缓存数据基于内存，io操作不会耗时太长，避免上下文切换消耗cpu性能
    # 支持持久化，支持主从同步，不仅支持k-v，还支持list、set、hash、zset等多种数据格式

    /** redis的分布式锁（setnx、set） */
    # setnx 返回值 1 0
    # set k v 'nx' 'ex' expireTime
    # del key解除锁

    /** 查找指定的key */
    # keys "prefix_"*
    # 一次取出所有，生产环境执行会导致服务有一定时间的卡顿

    # scan 0 match prefix_ count 200
    # 不会导致服务中断但是会产生部分重复的数据，可以做一次去重

    /** 做异步队列 */
    # 使用列表 lpush rpop等命令
    # 延迟消息队列 使用zset
    # zadd key score value
    # zrangebyscore key start end
    # 写入数据时分数设置为当前时间戳加上延迟时间，轮询处理的时候获取数据的分数小于当前时间戳的

    /** redis持久化 */
    # rbd(redis的默认持久化方式)   : 周期性同步	适合冷备份  持久化过程:
    # 单独fork一个子进程，子进程将父进程的数据复制到子进程的内存中，然后写入临时文件(dump.rdb)
    # 写入完成后将这个文件替换上一个快照文件，子进程退出，内存释放，持久化完成

    # aof	：记录操作日志append_only追加写入的方式 类似mysql的binlog		适合热备份
    # 当两种方式同时开启时，redis有先选择aof方式恢复数据

    /** 缓存雪崩 */
    # 原有缓存失效，导致原本缓存承受的请求全部去查询db了，db压力过高，严重会导致宕机，服务挂掉
    # 解决方式(事发前)：
    # 在key的过期时间上加上随机数，避免同一时间大量的key一起到期
    # 加锁， 让一个请求去load db更新缓存，而不是所有的请求都去加载数据库(setnx)

    # 事发中：访问源限流、熔断

    # 雪崩后
    # 重启后自动从磁盘上加载数据，恢复缓存数据

    /** 缓存穿透 */
    # 请求的数据在数据库中不存在，如恶意攻击等等
    # 对不存在的数据也进行缓存， 过期时间设置稍短即可
    # 运维层面对请求单位时间内请求频次过高超过阈值的ip进行限制
    # bloom filter过滤器 将所有可能的数据缓存到一个足够大的bitmap中(典型的就是哈希表)、
    # bloom filter的核心思想是通过多个hash函数来解决hash冲突问题(比如用同一hash计算的两个url值可能相同)
    # 如果一个hash算出来的值不在集合中，那么这个元素就不存在；所有hash值都存在才认为存在

    /** 缓存击穿 */
    # 是指某一个key是热点的，承载着很高的请求访问量，这个ky失效，然后请求直接落到db上 《凉凉》 张碧晨
    # 解决：永不过期
    # 当缓存失效时，不是立即去加载数据库的数据，而是通过例如setnx这样获取到锁之后去加载数据，然后重新设置缓存

    /** redis为什么这么快？ */
    # 官方100000+qps
    # 完全基于内存，绝大部分请求是纯内存操作，SO fast
    # 不存在多进程或是线程的上下文切换消耗cpu;
    # 不存在加锁释放锁的操作，也不存在死锁而导致的性能消耗


    /** redis集群高可用的方式？    哨兵集群 */
    # redis支持主从同步，cluster集群部署，通过哨兵监控redis主服务器的状态，若主服务器挂掉，将根据一定策略选出新主，然后将其他slave到新主节点
    # 选主策略：
    # a、slave的priority设置的越低，其优先级越高
    # b、a相同的情况下，复制的数据越多，优先级越高
    # c、b相同的情况下， runid 越小越容易被选中 // ？？？

    /** 哨兵的作用 */
    # 集群监控：负责监控 Redis master 和 slave 进程是否正常工作。
    # 消息通知：如果某个 Redis 实例有故障，那么哨兵负责发送消息作为报警通知给管理员。
    # 故障转移：如果 master node 挂掉了，会自动转移到 slave node 上。
    # 配置中心：如果故障转移发生了，通知 client 客户端新的 master 地址。


    /** 主从同步 读写分离 */
    # 读写分离可缓解主库压力
    # 从节点slave第一次连接到主库时会触发一个全量机制，master会fork一个子进程去生成rdb数据文件，
    # 并将该过程中的写操作记录到内存buffer中，rdb文件生成完后发送给slave从节点
    # 节点拿到文件后讲rdb文件数据写到本地磁盘然后加载进内存

    /** 过期策略内存淘汰机制 */
    # redis采取定期 + 惰性删除机制
    # 定期删除 redis默认每100ms会随机抽取一批key进行检查，删除过期的key
    # 惰性删除： 访问某个key的时候判断是否过期，是：删除之
    # 内存淘汰机制：max memory-policy  volatile-lru(该配置就是配置的内存淘汰机制)
    # volatile-lru 在已经过期的key中挑选最少使用的进行删除
    # allkeys-lru 从数据集中挑取最近最少使用的数据进行淘汰
    # volatile-ttl：从设置过期时间的数据中删除将要过期的数据

    /** 为什么redis的操作是原子的？怎么保证原子性？ */
    # redis的原子性命令是指不可拆分，要么执行要么不执行
    # 为什么是原子性的？ 因为redis是单线程的
    # redis提供的API操作都是原子性得，事物是为了保证批量操作的原子性

    /** redis的事物 */
    # multi 开启事物  EXEC 提交事务  DISCARD(清空事物队列，放弃执行事物)只是会结束本次事物，正确命令的操作依然成立 WATCH(为redis事物提供监控)
    # redis将事物中的命令序列化然后按顺序执行
    # redis事物中如果有命令错误则都不执行，如果是运行错误，正确的命令会正常执行

    /** redis命令保持原子性但是事物不保证原子性 */
}