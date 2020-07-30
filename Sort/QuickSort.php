<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/30
 * Time: 2:30 PM
 */

class QuickSort
{
    public function sort($arr)
    {
        if (count($arr) <= 1) {
            return $arr;
        }

        $k = $arr[0];

        $l_arr = $r_arr = [];

        for ($i=1; $i<count($arr); $i++){
            if ($arr[$i] > $k) {
                $r_arr[] = $arr[$i];
            }else{
                $l_arr[] = $arr[$i];
            }
        }

        $l_arr = $this->sort($l_arr);
        $r_arr = $this->sort($r_arr);

        return array_merge($l_arr, [$k], $r_arr);
    }
}