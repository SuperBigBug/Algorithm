<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/14
 * Time: 10:17 AM
 */

class InterviewTitle
{
    /*
        滴滴2019年php高级研发工程师面试题总结
        一 算法

        基本排序算法要会写,时间复杂度要会推算, 主要是冒泡排序, 快速排序, 选择排序.*/
    // 冒泡排序
    public function guLuSort($nums)
    {
        if (count($nums) <= 1){
            return $nums;
        }
        // 数组长度
        $len = count($nums);

        for ($i=0; $i<$len; $i++){
            for ($j=$i+1; $j<$len; $j++){
                if ($nums[$i] > $nums[$j]) {
                    $temp = $nums[$i];
                    $nums[$i] = $nums[$j];
                    $nums[$j] = $temp;
                }
            }
        }
        return $nums;
    }
    // 快速排序
    public function quickSort($nums)
    {
        if (count($nums) <= 1){
            return $nums;
        }
        // 数组长度
        $len = count($nums);

        $key = $nums[0];
        $l_arr = $r_arr = [];
        for ($i=1; $i<$len; $i++){
            if ($nums[$i] >= $key) {
                $r_arr[] = $nums[$i];
            }else{
                $l_arr[] = $nums[$i];
            }
        }
        $l = $this->quickSort($l_arr);
        $r = $this->quickSort($r_arr);
        return array_merge($l, [$key], $r);
    }
    // 插入排序
    function insertSort($nums)
    {
        if (count($nums) <= 1){
            return $nums;
        }

        $len = count($nums);

        for ($i=1; $i<$len; $i++) {
            $tmp = $nums[$i];
            for ($j=$i-1; $j>=0; $j--){
                if ($tmp < $nums[$j]) {
                    $nums[$j+1] = $nums[$j];
                    $nums[$j] = $tmp;
                }else{
                    break;
                }
            }
        }

        return $nums;
    }


    /*
        查找算法,要会写二分查找法, 实际场景要会应用.

    */
    function find($nums, $target)
    {
        $l = 0;
        $r = count($nums);
        while($l <= $r){
            $middle = intval(($l+$r)/2);

            if ($nums[$middle] == $target) {
                return $middle;
            }
            if ($nums[$middle] > $target) {
                $r -= 1;
            }
            if ($nums[$middle] < $target) {
                $l += 1;
            }
        }
        return false;
    }

    /*
        实例算法思路要明白,基本算法看多了, 我觉得是几种思路的变换, 需要自己领悟.
        面试中考过:

        猴子选大王
        斗地主项目设计
        实现随机函数
        字符串中元素各种变形查找
        123456 六个数放到三角形三个顶点及中点上,使每条边上的数字和相等
        一个超大文件里面存放关键,统计每个关键的个数, 问如何实现
        一个10G的文件,里面存放关键字, 但内存只有10M, 问如何实现统计, 出现关键字次数最高的前100个
        实现单链表与双链表
        实现有权重的随机算法
        应该就这么多,其他想不起来, 做这些算法需要冷静分析下, 不要轻易说no
    */
}


    /*

        二 php 知识
    */

    /*
        说说php的魔术变量, 要能全部说出来
    */
    function __construct() {}
    function __destruct() { /* 对象销毁前被自动调用 */}
    function __clone() { /* 在克隆一个对象的时候触发 */ }
    function __autoload() { /* 自动加载，在访问不存在的类时自动调用 */ }
    function __set($name, $value) { /* 当给不可访问属性赋值时自动调用 */ }
    function __get($name) { /* 尝试访问不可访问的属性时自动调用 */ }
    function __call($name, $arguments) { /* 当访问无法访问的函数时自动调用 */ }

    /*
        php的设计模式, 要能清晰说出单例, 工厂, 注册模式的实际应用.
    */
    // 单例
    // 单例模式确保某一个类只有一个实例，而且自行实例化并向整个系统全局地提供这个实例。它不会创建实例副本，而是会向单例类内部存储的实例返回一个引用
    class Singleton1
    {
        // 需要一个保存类的唯一实例的静态成员变量:
        static private $instance;

        // 构造函数和克隆函数必须声明为私有的，防止外部程序new类从而失去单例模式的意义:
        private function __construct()
        {
        }
        private function __clone()
        {
            // TODO: Implement __clone() method.
        }

        // 必须提供一个访问这个实例的公共的静态方法（通常为getInstance方法），从而返回唯一实例的一个引用
        static public function getInstance()
        {
            if (!self::$instance instanceof self) {
                self::$instance = new self();
            }
            return self::$instance;
        }
        public function test()
        {
            return 'Hello zhong yu';
        }
    }

    // 工厂类
    // 可以使用户根据获得对应类类型，避免了直接实例化类，降低耦合度（面向接口开发：客户端不用知道服务的有哪些类，只要知道类型就可以了）；
    // 缺点：可实例化的类型在编辑期间已经被确定，如果增加新类型，则需要修改工厂，不符合开闭原则。

    interface Transport {
        public function go();
    }

    class Bus implements Transport{
        public function go()
        {
            echo 'I am bus';
        }
    }

    class Car implements Transport{
        public function go()
        {
            // TODO: Implement go() method.
            echo 'I am car, sou sou';
        }
    }

    class TestFactory{
        static public function factory($type) {
            switch ($type) {
                case 'bus':
                    return new Bus();
                    break;
                case 'car':
                    return new Car();
                    break;
                default:
                    return new Car();
            }
        }
    }

    TestFactory::factory('car')->go();

    /*
        session与cookie的区别及如何解决session的跨域共享.
    */
        // 存储位置 : cookie存储在客户端浏览器，不安全， session存储在服务器端，安全
        // 据说cookie最大只能是4KB
        // 生命周期 cookie20分钟 session20分钟，访问则刷新
        // 客户端请求服务器的时候，服务端自动生成session和session id，并通过响应发送给客户端，客户端下次请求时带着session id来让服务器端区分
        // cookie是在客户端保持状态的方案， session是在服务端保持状态的方案

    /*
        如何防止sql注入及数据安全问题.
    */
        // 使用框架封装的方法
        // 对用户输入的信息进行过滤，校验

    /*
        php的生命周期, 启动流程, 多看TIPI.
    */
        // todo

    /*
        php的垃圾回收机制, php变量,数组 c源代码如何实现.
    */
        // 垃圾回收机制：引用计数
        // 在zval中设置了ref_count 和is_ref, ref_count为引用计数，当为0时被销毁
        // 对象被创建时+1，销毁时-1，为0 kill

    /*
        fastcgi 比 php-cgi 的优势在哪里.
    */
        // 不用对于每个请求都fork一次，别小看这个fork，对于访问量非常大的某个逻辑，你用CGI，会造成系统fork大量的进程。进程过多了有会造成切换，开销不小。
        // FCGI初始化操作不用对每个请求都进行。 有时候你的业务逻辑需要连接某个服务器，查询数据，如果查询非常频繁，用FCGI的话可以建立个长连接。用CGI的话，每次建立一个连接，无论是服务器端主动关闭连接还是CGI关闭连接，都会造成一定数量的TIME_WAIT连接。

        // FCGI劣势：
        // 1 如果你的程序实现某个地方有问题，比如内存小泄露，久而久之所占的内存会很大，CGI不会有这个问题。为了避免诸如此类的问题，很多人喜欢在FCGI处理一定数量的请求后自动exit。
        // 2 FCGI常驻内存，多少占点内存空间


    /*
        你用过那些框架, 各自有什么优缺点.
        你是怎么理解php的？
    */
    // Yii 是一个基于组件的高性能php框架，用于开发大型Web应用。Yii采用严格的OOP编写，并有着完善的库引用以及全面的教程。
    // 从 MVC，DAO/ActiveRecord，widgets，caching，等级式RBAC，Web服务，到主题化，I18N和L10N，Yii提供了 今日Web 2.0应用开发所需要的几乎一切功能。事实上，Yii是最有效率的PHP框架之一。
    // 纯OOP,用于大规模Web应用,模型使用方便,开发速度快，运行速度也快。性能优异且功能丰富,使用命令行工具。

    /*
        php运行模式有几种,分别是什么？
    */
        // cgi(通用网关接口)  fastcgi(常驻型) cli(命令行模式)  模块模式  isapi模式

    /*

        三 网络
        apache与nginx对比,你觉得他们各自的优缺点.
            nginx 轻量级，非阻塞，apache阻塞型，nginx并发性更好，nginx模块化设计 // todo 后续补充深入吧
            apache 稳定性较nginx更好些，配置较nginx复杂，nginx很简洁

        nginx与php数据通信原理是什么.

        描述http请求的三次握手.

        如何实现跨域请求.
        关于header的各种参数的作用.
        长连接的优势在哪里.


        四 数据库

        你采用mysql的引擎是什么. mysql innodb与myisam 这两种引擎本质区别是什么, 要能够从底层数据实现来说.
        mysql 字段类型有那些, 它们在内存能够存储多少字节数据, 比如 datetime timestamp date.
        在正式服务器上, 如何操作一个存储大数据表上增加一个字段或添加索引或改变数据字段类型.
        索引最左原则的意思是什么.
        mysql分库分表策略, 如何解决增表,减表问题.
        redis与memcached对比,各自优缺点.
            redis支持持久化

        redis与memcached如何实现分布式搭建.
        一致性hash原理是什么.
        mongodb与mysql对比,优势在什么地方.


        五 LINUX

        如何查看服务器负载
            top
        说说你常用的命令
            ls cd tail head grep mkdir touch ...
        如何统计日志文件中访问次数最多的十个ip地址.
            cat  test.log|awk -F" " '{print $2}'|sort|uniq -c|sort -nrk 1 -t' '|awk -F" " '{print $2}'|head -10
        源码编译过lamp 或 lnmp 软件吗

        在当前目录下,如何查找包含keyword文件.
            grep "keyword" filename
        如何重启php 或 nginx.
            service php-fpm restart    sbin目录下，./nginx -s reload
        进程与线程的区别
            进程是资源费配的最小单位, 线程是程序执行的最小单位；一个进程由一个或是多个线程组成；线程的上下文切换比进程的上下文切换要快
        什么情况下会出现死锁, 如何解决死锁.


        六 综合

        说说你在工作中碰到的难题及如何解决的, 或讲讲你做过的项目中有难度的项目.
        你能说一下微博的架构流程是什么样的吗? (这个问题我也是醉了)
        说说你们现在服务器的架构是什么样子？
        高并发,高流量情况下,如何设计秒杀或抢红包架构？
        除了php,你还会哪种语言？


        大佬面试题

        PHP垃圾回收机制
        PHP的弱语言类型如何实现的
        PHP异常的使用方法以及你的经历
        swoole的进程模型
        TCP/IP协议

        滴滴
        考的是strpos返回值与true false和==以及===的问题
        简述tcp udp http与https的一些东西,除了php，你还写过哪几种语言，感觉有什么区别。
        如何取出nginx日志中访问最多的前十个ip地址
        mysql中binlog是什么简述一下，一个事务在主从延迟中可能会产生什么问题
        手写函数，用球形结构将一个文件夹中所有文件以及文件夹展开
        为什么用swoole？swoole的优势是什么？
        tcp三次握手过程，详细一些。
        握手过程中可能出什么问题
        优先级队列如何实现
        什么是epoll？你怎么用的，简单写下代码？accept阻塞在哪儿了？如果是epoll为什么不阻塞了？
        异步和非阻塞的区别，说详细
        php中使用epoll的伪代码流程
        进程，线程，协程的区别
            进程由操作系统控制, 线程有操作系统控制，协成由用户控制
        最大堆最小堆实现优先级队列
        arp协议和rarp协议，说下arp劫持
        epoll的常用模式是哪两种？区别是什么？
    */