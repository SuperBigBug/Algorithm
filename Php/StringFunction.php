<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/18
 * Time: 8:47 PM
 */

class StringFunction
{
    public function FUN(){
        // 去空格
        trim(' ');
        ltrim('');
        rtrim(' ');

        strlen('test');
        substr('  ',0,1);

        // 检索目标子串在字符串中出现次数
        substr_count('test string', 'string');
        // 字符串替换
        str_replace('a','b','beijing');
        //字符串分隔
        explode('|','string');
        // 合成字符串
        implode(' ', array());
        // 转小写
        strtolower('');
        // 转大写
        strtoupper('');
    }
}