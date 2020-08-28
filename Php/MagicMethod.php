<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/11
 * Time: 4:02 PM
 */

class MagicMethod
{
    /** require include */
    # require 引入文件如果不存在，程序终止
    # include 引入文件如果不存在，只是警告，程序继续执行

    /** 命名空间 */
    # 命名空间主要解决的是名字冲突问题
    # 在有命名空间的情况下实现自动加载：spl_autoload_register
    # spl_autoload_register()函数原理，将传入的参数注册到spl_autoload队列中，并移除系统默认的__autoload函数
    # 一旦访问未定义的类时，调用spl_autoload_register函数就会按顺序调用注册过的所有函数
    # psr4编码规范要求必须有一个顶级命名空间如app
    # 顶级域名空间\自域名空间\类名


    public function __autoload()
    {
        // 自动加载
        // 当实例化一个不存的类的时候，会自动调用该方法，引入对应的文件
    }


    public function __construct()
    {
        //构造方法
        // 实例化一个对象的时候系统会自动调用该函数, 该参数支持参数
    }

    public function __destruct()
    {
        // 析构方法是对象在销毁之前自动调用的
    }

    public function __clone()
    {
        // 在克隆一个对象的时候自动调用, 克隆出来的对象还是不是类的一个实例呢？ 可以使用instanceof判断, 返回true or false
    }

    public function __get($name)
    {
        // 当访问未定义的属性时自动调用该函数
    }

    public function __set($name, $value)
    {
        // 当给未定义的属性赋值时自动调用该函数
    }

    public function __isset($name)
    {
        // 当在一个未定义的属性上调用isset()函数时自动调用
    }

    public function __unset($name)
    {
        // TODO: Implement __unset() method.
    }
}

class TestMagic
{
    public $name;

    // __get()魔术方法在访问不存在的属性时被调用
    public function __get($name)
    {
        return '你访问的属性不存在:'.$name;
    }

    public function __isset($name)
    {
        return $name;
    }
}