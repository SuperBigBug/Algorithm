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

class ClimbStairs {

    /**
     * 动态规划
     *
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

    /**
     * 暴力法, 存在大量重复计算
     *
     * @param $n
     * @param $i
     * @return int
     */
    function climbStairs1($i, $n) {
        if ($i>$n) {
            return 0;
        }
        if ($i == $n) {
            return 1;
        }

        return $this->climbStairs1($i + 1, $n) + $this->climbStairs1($i + 2, $n);
    }

    /**
     * 暴力法记忆优化
     *
     * @param $i
     * @param $n
     * @param $arr
     * @return int
     */
    function climbStairs2($i, $n, &$arr) {
        if ($i > $n) {
            return 0;
        }
        if ($i == $n) {
            return 1;
        }

        if (isset($arr[$i])) {
            return $arr[$i];
        }

        $arr[$i] = $this->climbStairs2($i+1, $n, $arr) + $this->climbStairs2($i+2, $n, $arr);

        return $arr[$i];
    }


    /**
     * 斐波那契数列
     *
     * @param $n
     * @return int
     */
    function climbStairsFib($n) {
        if ($n == 0) {
            return 0;
        }

        if($n == 1) {
            return 1;
        }

        $first = 1;
        $second = 2;

        for ($i=3; $i<=$n; $i++) {
            $third = $second + $first;
            $first = $second;
            $second = $third;
        }
        return $second;
    }
}