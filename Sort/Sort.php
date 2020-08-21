<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/21
 * Time: 5:21 PM
 */

class Sort
{
    // 冒泡排序
    public function maoPao($num)
    {
        if (count($num) < 2) {
            return $num;
        }

        $len = count($num);

        for ($i=0; $i<$len; $i++) {
            for ($j=$i+1; $j<$len; $j++) {
                if ($num[$i] > $num[$j]) {
                    $temp = $num[$i];
                    $num[$i] = $num[$j];
                    $num[$j] = $temp;
                }
            }
        }
        return $num;
    }

    // 选择排序
    public function chooseSort($num)
    {
        if (count($num) < 2) {
            return $num;
        }

        $len = count($num);

        for ($i=0; $i<$len-1; $i++) {
            $key = $i;
            for ($m=$i+1; $m<$len; $m++) {
                if ($num[$key] > $num[$m]) {
                    $key = $m;
                }
            }
            if ($key != $i) {
                // 交换最小元素位置
                $temp = $num[$i];
                $num[$i] = $num[$key];
                $num[$key] = $temp;
            }
        }
        return $num;
    }

    // 插入排序
    public function insertSort($num)
    {
        if (count($num)<2) {
            return $num;
        }

        $len = count($num);
        for ($i=1; $i<$len; $i++) {
            $tmp = $num[$i];
            for ($j = $i - 1; $j >= 0; $j--) {
                if ($num[$j] > $tmp) {
                    $num[$j + 1] = $num[$j];
                    $num[$j] = $tmp;
                } else {
                    break;
                }
            }
        }
        return $num;
    }

    // 快速排序
    // 思想：随机找出一个数（通常就拿数组的第一个数就行），把它插入一个位置，使得它左边的数都比它小，右边的数都比它大，
    // 这样就将一个数组分成了两个子数组，然后在按照同样的方法把子数组分成更小的子数组，直到不能分解为止
    public function quickSort($num)
    {
        if (count($num) < 2) {
            return $num;
        }

        $len = count($num);
        $flag = $num[0];

        $l_arr = $r_arr = [];
        for ($i=1; $i<$len; $i++) {
            if ($num[$i] > $flag) {
                $r_arr[] = $num[$i];
            }else{
                $l_arr[] = $num[$i];
            }
        }

        $l = $this->quickSort($l_arr);
        $r = $this->quickSort($r_arr);

        return array_merge($l, [$flag], $r);
    }

    // 希尔排序


    // 归并排序

    // 堆排序
}