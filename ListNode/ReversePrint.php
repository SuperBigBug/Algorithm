<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/15
 * Time: 9:18 PM
 */

class ReversePrint
{
//    剑指 Offer 06. 从尾到头打印链表
//    输入一个链表的头节点，从尾到头反过来返回每个节点的值（用数组返回）。
//
//
//
//    示例 1：
//
//    输入：head = [1,3,2]
//    输出：[2,3,1]
    /**
     * Definition for a singly-linked list.
     * class ListNode {
     *     public $val = 0;
     *     public $next = null;
     *     function __construct($val) { $this->val = $val; }
     * }
     */

    /**
     * @param ListNode $head
     * @return Integer[]
     */
    function reversePrint($head) {
        $res = [];
        while($head != null) {
            $res[] = $head->val;
            $head = $head->next;
        }
        return array_reverse($res);
    }
}