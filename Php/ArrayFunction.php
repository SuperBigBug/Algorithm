<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/8/18
 * Time: 8:54 PM
 */

class ArrayFunction
{
    public function study()
    {
        // 舍弃数组中的key，返回的数组为从0开始的数字索引数组
        array_values([]);
        // 返回数组中的键名
        array_keys([]);

        in_array(' ',[]);
        // 数组反转，true: 键名保持不变, 否则丢失
        array_reverse([],true);
        // 在数组中查找元素，找到返回其键名
        array_search(' ',[]);
        // 判断数组中是否存在该key
        array_key_exists('',[]);
        // 将数组拆分为多个， true 则保留键名
        array_chunk([],2,true);
        // 向数组末尾插入元素
        $arr = [];
        array_push($arr,'');
        // 弹出数组的最后一个元素 出栈
        array_pop($arr);
        // 从头部弹出元素
        array_shift($arr);
        // 在数组开头插入一个或多个单元
        array_unshift($arr,'');

        // 数组排序(由小到大)不保留键名
        sort($arr);
        // 由大到小 不保留键名
        rsort($arr);

        // 排序, 从小到大, 保留键名
        asort($arr);
        // 从大到小, 保留键名
        arsort($arr);

        // 按照键名正序排序
        ksort($arr);
        // 按照键名逆序排序
        krsort($arr);

        // 数组合并 相同的字符串键名，后面的覆盖前面的，相同的数字键名，后面的不会做覆盖操作，而是附加到后面
        array_merge([],[]);

        // 返回两个数组的差集
        array_diff([],[]);

        // 生成一个包含指定范围元素的数组
        range(0,10);
        // 数组去重
        array_unique($arr);
        // 打乱数组元素顺序
        shuffle($arr);



    }
}