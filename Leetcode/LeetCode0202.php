<?php

//实现一种算法，找出单向链表中倒数第 k 个节点。返回该节点的值。
//
// 注意：本题相对原题稍作改动
//
// 示例：
//
// 输入： 1->2->3->4->5 和 k = 2
//输出： 4
//
// 说明：
//
// 给定的 k 保证是有效的。
// Related Topics 链表 双指针
// ? 42 ? 0


//leetcode submit region begin(Prohibit modification and deletion)
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class LeetCode0202
{
    function solve($head, $k)
    {
        if ($k <0 || $head == null){
            return false;
        }

        $fast = $slow = $head;

        for ($i=0; $i<$k-1; $i++) {
            $fast = $fast->next;
        }
        while ($fast->next != null) {
            $fast = $fast->next;
            $slow = $slow->next;
        }
        return $slow->val;
    }
}