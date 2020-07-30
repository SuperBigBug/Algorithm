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
     * @desc 二分查找
     *
     * @param $arr
     * @param $target
     * @return bool|float
     */
    public function find($arr, $target)
    {
        $s = 0;
        $e = count($arr);

        $m = floor(($s + $e) / 2);

        while($s <= $e) {
            if ($arr[$m] == $target) {
                return $m;
            }
            if ($arr[$m] > $target) {
                $e -= 1;
            }
            if ($arr[$m] < $target) {
                $s += 1;
            }
        }
        return false;
    }
}