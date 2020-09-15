<?php
//给定一个链表，删除链表的倒数第 n 个节点，并且返回链表的头结点。
//
// 示例：
//
// 给定一个链表: 1->2->3->4->5, 和 n = 2.
//
//当删除了倒数第二个节点后，链表变为 1->2->3->5.
//
//
// 说明：
//
// 给定的 n 保证是有效的。
//
// 进阶：
//
// 你能尝试使用一趟扫描实现吗？
// Related Topics 链表 双指针
// 👍 989 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class LeetCode19
{
    // 快慢指针
    function solve($head, $n)
    {
        $newHead = new ListNode();
        $newHead->next = $head;


        $fast = $slow = $newHead;
        // 快指针先走
        for ($i=0; $i<=$n; $i++){
            $fast = $fast->next;
        }
        while($fast !== null) {
            $fast = $fast->next;
            $slow = $slow->next;
        }
        // 慢指针做删除
        $slow->next = $slow->next->next;
        return $newHead->next;
    }

    // 两趟遍历
    function solve2($head, $n)
    {

        $node = new ListNode();
        $node->next = $head;

        $len = 0;
        $cur = $head;
        while ($cur!=null){
            $cur = $cur->next;
            $len++;
        }
        $len -= $n;
        $k = $node;

        while ($len>0) {
            $len--;
            $k = $k->next;
        }
        $k->next = $k->next->next;
        return $node->next;
    }
}