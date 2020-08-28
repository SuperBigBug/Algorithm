<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/28
 * Time: 3:31 PM
 */

define('set',[
    'zhang san',
    'li si'
]);

class Php7
{

    public function test()
    {
        /** PHP7 新特性 */

        # 特性一: 太空船运算符  <=>
        # 1<=>2    -1
        # 1<=>1    0
        # 2<=>1    1

        # 特性二: null 合并运算符
        $name = 'a san';
        $title = isset($name) ? $name : ' san';
        $title = $name ?? 'san';
        # 二者效果等同

        # 特性三: 常量数组
        var_dump(set[1]);

        /** 废弃特性 */
        # 以静态方式调用非静态方法
        # B::range();

    }

    public function rang() {}
}

class B
{
    public function rang() {}
}