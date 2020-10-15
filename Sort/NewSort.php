<?php

namespace App\Sort;

class NewSort
{
    /**
     * @desc 原地排序, 稳定, 空间复杂度O(1), 时间复杂度O(n*n)
     * @param $arr array
     * @param $n int
     * @return mixed
     */
    function sort1($arr, $n)
    {
        if ($n <= 1) {
            return $arr;
        }
        for ($i=0; $i<$n; $i++) {
            for ($j=$i+1; $j<$n; $j++) {
                if ($arr[$i] > $arr[$j]) {
                    $tmp = $arr[$i];
                    $tmp[$i] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
        return $arr;
    }

    /**
     * @desc 插入排序 原地排序, 空间复杂度O(1), 时间复杂度O(n*n), 稳定的
     * @param $array
     * @param $n
     * @return mixed
     */
    function insertSort($array, $n)
    {
        if ($n < 2) {
            return $array;
        }
        // 第一个元素认为是有序, 从第二个元素开始处理
        for ($i=1; $i<$n; $i++) {
            $tmp = $array[$i];
            for ($j=$i-1; $j>=0; $j--) {
                if ($array[$j] > $tmp) {
                    $array[$j+1] = $array[$j];
                    $array[$j] = $tmp;
                }else{
                    break;
                }
            }
        }
        return $array;
    }

    /**
     * @desc 选择排序 不稳定 时间复杂度O(n*n) 空间复杂度O(1) 原地排序
     * @param $array
     * @param $n
     * @return mixed
     */
    function chooseSort($array, $n)
    {
        if ($n < 2) {
            return $array;
        }

        for ($i=0; $i<$n-1; $i++) {
            $key = $i;
            for ($j=$i+1; $j<$n; $j++) {
                if ($array[$j] < $array[$i]) {
                    $key = $j;
                }
            }

            if ($key != $i) {
                $tmp = $array[$i];
                $array[$i] = $array[$key];
                $array[$key] = $tmp;
            }
        }
        return $array;
    }


    /** *********************************************************************************** */
                /** 以上三种排序时间复杂度均为O(n*n), 适合规模较小的数据排序*/
    /** *********************************************************************************** */






    /** *********************************************************************************** */
           /** 接下来的两种排序, 时间复杂度为O(n log n), 比较适合稍大规模数据排序, 更为常用*/
    /** *********************************************************************************** */

    /**
     * @desc 快速排序
     * @param $array
     * @return array
     */
    function quickSort($array)
    {
        if (count($array) < 2) {
            return $array;
        }

        // 数组长度
        $length = count($array);

        $l_arr = $r_arr = [];
        $key = $array[0];
        for ($i=1; $i<$length-1; $i++) {
            if ($array[$i] > $key) {
                $r_arr[] = $array[$i];
            }else{
                $l_arr[] = $array[$i];
            }
        }

        $l = $this->quickSort($l_arr);
        $r = $this->quickSort($r_arr);
        return array_merge($l, [$key], $r);
    }


}