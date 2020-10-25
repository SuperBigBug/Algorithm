<?php

//给定 n 个非负整数表示每个宽度为 1 的柱子的高度图，计算按此排列的柱子，下雨之后能接多少雨水。
//
//
//
// 示例 1：
//
//
//
//
//输入：height = [0,1,0,2,1,0,1,3,2,1,2,1]
//输出：6
//解释：上面是由数组 [0,1,0,2,1,0,1,3,2,1,2,1] 表示的高度图，在这种情况下，可以接 6 个单位的雨水（蓝色部分表示雨水）。
//
//
// 示例 2：
//
//
//输入：height = [4,2,0,3,2,5]
//输出：9
//
//
//
//
// 提示：
//
//
// n == height.length
// 0 <= n <= 3 * 104
// 0 <= height[i] <= 105
//
// Related Topics 栈 数组 双指针
// 👍 1770 👎 0

//leetcode submit region end(Prohibit modification and deletion)

class LeetCode42
{
    public function solve1($height)
    {
        $len = count($height);
        $res = 0;

        for ($i=0; $i<$len-1; $i++) {
            $l_max = $r_max = 0;

            // 找到左面最高的柱子
            for ($j=$i; $j>=0; $j--) {
                $l_max = max($l_max, $height[$j]);
            }

            // 找到右面最高的柱子
            for ($k = $i; $k < $len; $k++) {
                $r_max = max($r_max, $height[$k]);
            }

            $res += min($l_max, $r_max) - $height[$i];
        }
        return $res;
    }
}