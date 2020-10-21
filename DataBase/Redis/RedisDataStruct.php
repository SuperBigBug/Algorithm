<?php

class RedisDataStruct
{
    /** Redis 支持的数据类型*/
    # String 字符串
        # set key value、 get key

    # Hash 哈希表
        # Hmset key filed value, field value
        # Hmget key field , field 1
        # Hset key field value
        # Hget key field
        # Hdel key field

    # Set(为string类型无序集合, 元素不重复, 自动去重 一个集合可以存储40+亿个数据)
        # Sadd key value1, value2 ...
        # Smembers key
        # Scard key 获取集合中元素个数

    # Sorted set(有序集合, 元素不重复)
        # ZADD key score value
        # Zrange key score_start score_end

    # List(和set的区别, list允许元素重复, set不重复)
        # Lpush key value
        # Rpop key
        # Lrange key 0 10
        #llen 获取列表长度

    /** 底层数据结构 */
    # 动态字符串  (string)
    # 双向链表    (list)
    # 压缩列表    (list hash sorted set)
    # 哈希表      (hash set)
    # 跳表        (sorted set)
    # 整数数组     (set)

    /** Redis底层 */
    # 为了实现从key到value的快速访问, redis用一个哈希表保存了所有的键值对
    # 哈希表其实就是一个数组, 每个数组的元素都是一个哈希桶, 桶内保存着指向键值对的指针
    # 该哈希表保存了所有的键值对, 也被称为全局哈希表
    # 哈希表的最大好处就是可以在O(1)的时间复杂度找到元素, 只需要计算键的哈希值, 然后直接去找即可

    /** Redis 为什么会变慢? */
    # 哈希冲突 key计算出的hash值在一个桶中冲突的解决方式是链表形式保存(链式哈希)
    # 当存入数据越多, 哈希冲突越多, 链表越长, 查找效率越低

    # 此时redis会做rehash操作, 也就是增加哈希桶, 来降低每个桶中元素个数来降低冲突的概率


    /** reHash过程*/
    # 为了让redis更高效, redis默认使用了两个哈希表
    # 最开始插入数据时, 默认使用哈希表1, 哈希表2并未分配空间; 随着数据量的增多, redis做rehash

    # 1、redis给哈希表 2 分配更大的空间(比如是哈希表 1 的两倍)
    # 2、将哈希表 1 中的数据按照映射拷贝到哈希表2中(大量的拷贝工作)
    # 3、释放哈希表 1 的空间

    # 到此, 切换到哈希表 2 来保存数据, 哈希表一做下次rehash的备用

    /** 渐进式 */
    # 上面第2步, 涉及大量的数据拷贝, 如果一次迁移大量数据会造成线程阻塞, 一段时间内无法提供服务, 即快速查询等

    # 为了避免上面的情况, redis在处理第一个请求的时候, 将第一个索引位置的数据拷贝到哈希表2中
    # 第二个请求来的时候将索引位置2的数据拷贝, 以此类推

    /** 和string类型不同, 集合类型的数据操作效率和什么有关? */
    # 底层数据结构: 整数数组 哈希表 双向链表 跳表 压缩列表
    # 哈希表的操作 ↑ 整数数组和双向链表是顺序读写, 通过下表访问和指针逐一访问, 复杂度为O(n), 效率较低

    /** 压缩列表 */

    /** 跳表 */


}
