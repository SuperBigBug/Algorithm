<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/9/14
 * Time: 5:10 PM
 */

class LittleTips
{
    function study()
    {
        /** foreach 以及数组函数 (array_*) 可以处理空数组。不需要先进行测试,可减少一层缩进 */
        //eg:
        // 优化后
        $items = [];
        foreach ($items as $item) {
            // process on $item ...
        }

        // 优化前
        $items = [];
        if (count($items) > 0) {
            foreach ($items as $item) {
                // process on $item ...
            }
        }
    }

    /**
     * 哨兵在开发过程中的应用, 性能提升
     *
     * @param $target_array @目标数组
     * @param $arr_size @数组大小
     * @param $target @目标值
     * @return int
     */
    function sentry($target_array, $arr_size, $target)
    {
        if (empty($target_array) || $arr_size < 1) {
            return -1;
        }

        $i=0;
        while($i<$arr_size) {
            if ($target_array[$i] == $target) {
                return $i;
            }
            $i++;
        }
        return -1;
    }

}