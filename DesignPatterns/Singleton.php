<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/28
 * Time: 2:48 PM
 */

class Singleton
{
    static private $instance;

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