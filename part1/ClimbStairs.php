<?php

/**
 *
    70. 爬楼梯
        假设你正在爬楼梯。需要 n 阶你才能到达楼顶。
        每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？
        注意：给定 n 是一个正整数。

        示例 1：
        输入： 2
        输出： 2
        解释： 有两种方法可以爬到楼顶。
        1.  1 阶 + 1 阶
        2.  2 阶
 *
 */

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        if($n < 1) {
            return 0;
        }

        $arr = [];
        $arr[1] = 1;
        $arr[2] = 2;
        for($i=3; $i<= $n; $i++){
            $arr[$i] = $arr[$i-1] + $arr[$i-2];
        }
        return $arr[$n];
    }
}