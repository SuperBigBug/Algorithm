<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/29
 * Time: 8:00 PM
 */

class GuluSort
{
    public function sort($arr)
    {
        if (count($arr) <= 1) {
            return $arr;
        }

        for($i=0; $i<count($arr); $i++){
            for ($j=$i+1; $j<count($arr); $j++){
                if ($arr[$i] > $arr[$j]) {
                    $t = $arr[$i];
                    $arr[$j] = $t;
                    $arr[$i] = $t;
                }
            }
        }

        return $arr;
    }
}