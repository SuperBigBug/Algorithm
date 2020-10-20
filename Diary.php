<?php

class Diary
{
    # 2020/09/15
    # 链表 反转单链表、19删除链表倒数第n个节点、21合并两个有序链表

    function sort($nums)
    {
        if (count($nums) < 2) {
            return $nums;
        }

        for ($i=1; $i<count($nums); $i++) {
            $tmp = $nums[$i];
            for ($j=$i-1; $j>=0; $j--) {
                if ($nums[$j] > $tmp) {
                    $nums[$j+1] = $nums[$j];
                    $nums[$j] = $tmp;
                }else{
                    break;
                }
            }
        }
        return $nums;
    }

    function sortChoose($num)
    {
        if (count($num) < 1) {
            return $num;
        }

        for ($i=0; $i<count($num)-1; $i++) {
            $key = $i;
            for ($j=$i+1; $j<count($num); $j++) {
                if ($num[$i] > $num[$j]) {
                    $key = $j;
                }
            }

            if ($key != $i){
                $temp = $num[$key];
                $num[$key] = $num[$i];
                $num[$i] = $temp;
            }
        }
        return $num;
    }
}