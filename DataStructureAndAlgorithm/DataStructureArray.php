<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/9/14
 * Time: 4:11 PM
 */

class DataStructureArray
{
    /**
     * 数组特性: 连续的内存空间、元素类型一致    杀手锏特性: 随机访问
     * But, 有利有弊, insert delete需要做大量的数据搬运工作
     */

    /**
     * 数组访问元素的过程：
     */
    # 计算机会为内存的每个存储单元分配一个地址, 通过地址来访问内存中的数据, 当需要访问某个元素时会先计算元素地址, 根据地址去访问
    # a[int 10] 计算机为改数组分配一块连续的内存, 内存块的首地址为baseAddress
    # address[i] = baseAddress + data_type_size * i
    # 数组根据下标随机访问的时间复杂度是O(1)

    /**
     * 为什么数组的下标从0开始而不是1 ？
     */
    # 访问数组元素计算元素地址时为a[k] = baseAddress + data_type_size * k
    # 如果是从1开始, a[k] = baseAddress + data_type_size * ( k-1 ) 多进行一次减的计算
}