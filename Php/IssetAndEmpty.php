<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/28
 * Time: 3:58 PM
 */

class IssetAndEmpty
{
    public function test()
    {
        $a = '';
        $b = 0;
        $c = false;
        $d = [];
        $e = null;

        var_dump(isset($a));        // true
        var_dump(isset($b));        // true
        var_dump(isset($c));        // true
        var_dump(isset($d));        // true
        var_dump(isset($e));        // false
        var_dump(isset($f));        // false

        echo '+++++++++++'.PHP_EOL;

        var_dump(empty($a));        // true
        var_dump(empty($b));        // true
        var_dump(empty($c));        // true
        var_dump(empty($d));        // true
        var_dump(empty($e));        // true
        var_dump(empty($f));        // true
    }
}