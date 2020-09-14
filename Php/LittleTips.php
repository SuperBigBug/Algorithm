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

}