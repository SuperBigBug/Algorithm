<?php

/**
 * 两数之和 LeetCode 第一题
 * Class TwoSum
 */
class TwoSum
{
    //给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
//
// 你可以假设每种输入只会对应一个答案。但是，数组中同一个元素不能使用两遍。
//
//
//
// 示例:
//
// 给定 nums = [2, 7, 11, 15], target = 9
//
//因为 nums[0] + nums[1] = 2 + 7 = 9
//所以返回 [0, 1]
//
// Related Topics 数组 哈希表
// 👍 8885 👎 0

    /**
     * @desc 暴力计算, 时间复杂度为O(n*n)
     * @param $num array 目标数组
     * @param $target int 目标和值
     * @return array
     */
    public function method_one($num, $target)
    {
        if (count($num) <= 1) {
            return $num;
        }

        // 数组长度
        $len = count($num);
        for ($i=0; $i<$len; $i++){
            for ($j=$i+1; $j<$len; $j++){
                if ($num[$i] + $num[$j] == $target) {
                    return [$i, $j];
                }
            }
        }
        return [];
    }

    /**
     * @desc 借助HashMap 实现算法， 时间复杂度为 O(n)
     * @param $num array 目标数组
     * @param $target int 目标和值
     * @return array
     */
    public function method_two($num, $target)
    {
        if (count($num) <= 1) {
            return $num;
        }

        $hashMap = [];
        foreach ($num as $k => $v) {
            if (array_key_exists($target-$v, $hashMap)) {
                return [$k, $hashMap[$target-$v]];
            }
            $hashMap[$v] = $k;
        }
        return [];
    }

}