<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/28
 * Time: 2:53 PM
 */

// 工厂模式

// 高级英语翻译 : one word go, jia jia jia    Do you know the meaning?

interface Transports {
    public function go();
}

class Bike implements Transports{
    public function go()
    {
        echo 'Let us biking together!';
    }
}

class Air implements Transports
{
    public function go(){
        echo 'Let us flying together!';
    }
}

class FactoryClass
{
    static public function factory($type) {
        switch ($type) {
            case 'Air':
                return new Air();
                break;
            case 'Bike':
                return new Bike();
                break;
            default:
                return new Bike();
        }
    }
}

FactoryClass::factory('Bike')->go();