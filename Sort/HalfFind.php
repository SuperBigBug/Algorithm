<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/30
 * Time: 2:48 PM
 */

class HalfFind
{
    /**
     * @desc 二分法查找 效率老高了 前提: 必须是有序的数组
     * @desc 二分法时间复杂度为 O(log n)
     *
     * @param $nums
     * @param $val
     * @return float|int
     */
    function find($nums, $val)
    {
        if (count($nums) < 1) {
            return $nums;
        }

        $low = 0;
        $high = count($nums) - 1;

        // 易错点一: $low <= $high, 而不是<
        while($low <= $high) {

            // 易错点二 : 中间位置
            // 这种写法而不是$key = ($low + $high) / 2 是为了避免当low 和 high都很大的时候求和发生溢出
            // 比这种写法效率更高的写法是 : $key = ($low + ($high - $low) >> 1) Why? 因为计算机进行位运算比进行除法运算更快哦
            $key = floor($low + ($high - $low) / 2);

            if ($nums[$key] == $val) {
               return $key;
            }elseif ($nums[$key] < $val) {
                // 易错点三: 边界值变更是 key + 1 或是 key - 1
                // 🌰 : 当$low = $high = 3, but $nums[3] != $val, gg, 死循环了
                $low = $key + 1;
            }else{
                $high = $key - 1;
            }
        }
        return -1;
    }

    /** 在一定程度上效率高于常数级时间复杂度, 常数级别时间复杂度可以使O(10000) */
    /** 二分法在pow(2, 32)接近42亿个有序元素数组中进行查找, 最多也只进行32次, 牛逼牛逼 */
}