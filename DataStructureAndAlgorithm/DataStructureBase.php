<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/9/14
 * Time: 2:42 PM
 */
class DataStructureBase
{
    /**
     * 时间复杂度
     * O(n!) O(2**n) 时间复杂度随数据量的增加骤增, 性能最差
     */

    /**
     * O(1)
     */
    public function O1()
    {
        $a = 0;
        $b = 0;
        return $a+$b;
    }

    /**
     * O(log(n))
     */
    public function OLogN()
    {
        $i=1;
        while($i<100) {
            $i = $i*2;
        }
        return false;
    }

    /**
     * 最好情况时间复杂度
     *
     * 最坏情况时间复杂度
     * 平均情况时间复杂度
     * 均摊情况时间复杂度
     */
}