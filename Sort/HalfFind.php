<?php


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
            // 比这种写法效率更高的写法是 : $key = ($low + ($high - $low) >> 1) Why? 因为计算机进行位运算比进行除法运算更快
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

    // 优点 1 在一定程度上效率高于常数级时间复杂度, 常数级别时间复杂度可以使O(10000)
    // 优点 2 二分法在pow(2, 32)接近42亿个有序元素数组中进行查找, 最多也只进行32次, 牛逼牛逼

    // 局限性 1 必须是顺序表结构(数组) 链表你试试, 复杂度会很高滴
    // 局限性 2 必须是有序的, 如果对无序的数组进行排序在查找就要视情况而定了, 毕竟最小的排序时间复杂度也要 O(nlogn)

    // Tips 1 数据量过小, 如10个元素的数组, 直接轮询就得了, 没啥差别
    // Tips 2 如果数据量不大, 但是每次比对十分耗费时间, 建议二分, 减少比对次数, 提升查找时间
    // Tips 3 数据量过大, 不宜二分, 1G的数据, 就意味着要有1G的连续内存空间, 要求稍微有些高, 海量数据查找以后再说

}