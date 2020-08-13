<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/28
 * Time: 2:48 PM
 */


// todo 优、缺点

/**
 * Class Singleton
 * 优点: 禁止实例化，确保所有对象都访问唯一实例
 *      避免大量的new操作, 每一次new操作都要消耗内存资源和系统资源
 * 缺点: 每次请求时都要检查是否存在类的实例, 需要一些开销
 *
 */


class Singleton
{
    // 定义静态私有变量保存类的实例
    static private $instance;

    // 私有构造，禁止调用
    private function __construct() {}

    private function __clone() {}

    static public function getInstance()
    {
        // 判断$instance是否是Singleton的对象，不是则创建
        if (!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function test()
    {
        echo 'test';
    }
}

class StudySingleton
{
    static private $instance;

    // 防止使用new直接创建对象
    private function __construct()
    {
    }

    // 防止使用clone克隆对象
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    static public function getInstance()
    {
        if (!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function test(){
        return 'hello my friend';
    }
}

$res = StudySingleton::getInstance()->test();
