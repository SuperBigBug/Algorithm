<?php

namespace App\DataStructureAndAlgorithm\Recursion;

use App\Leetcode\LeetCode70;

class RecursionBase
{
    function base()
    {
        /** 递归的满足条件 */
        # 1、问题可以被拆分为多个子问题来求解
        # 2、子问题的求解思路和原问题求解流程一致
        # 3、存在终止条件, 递归可以终止, 不能无限
        # eg: 爬楼梯问题搞起

        # 100阶楼梯, 每次一个或是两个台阶, 有多少种解法
        $stars = 100;
        $result = (new LeetCode70())->solve($stars);


        /** 调试递归*/

        # 1.打印日志发现，递归值。
        # 2.结合条件断点进行调试。
    }


}