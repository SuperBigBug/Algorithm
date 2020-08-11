<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/11
 * Time: 4:02 PM
 */

class MagicMethod
{
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
        // TODO: Implement __destruct() method.
        // 析构方法是对象在销毁之前自动调用的
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
        // 在克隆一个对象的时候自动调用, 克隆出来的对象还是不是类的一个实例呢？ 可以使用instanceof判断, 返回true or false
    }

    // __get() 当调用一个未声明的属性时，(该属性当前类、父类不存在时)调用该方法，传入参数为属性名
    // __set() 当给一个未声明的属性赋值时调用该方法，传递值为属性名和值

}