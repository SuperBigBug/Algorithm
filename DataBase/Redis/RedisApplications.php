<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/10/9
 * Time: 11:31 AM
 */

class RedisApplications
{
    # read/write through 模式
    # Cache Aside 模式
    // 区别： 前者更新缓存，后者删除缓存，读取时再写入

    /** 系统升级重启或是缓存刚上线, 如何避免缓存雪崩问题？ */
    // 灰度发布方式, 先接入少量的请求, 后续逐步加大请求接入数量, 直到切换完成
    // 缓存预热, 将比较常用的数据提前进行缓存

    /** 如何减少Mysql和Redis模式下的缓存出现脏数据？*/
    // 数据加版本号, 更新缓存的时候只允许高版本覆盖低版本的



}