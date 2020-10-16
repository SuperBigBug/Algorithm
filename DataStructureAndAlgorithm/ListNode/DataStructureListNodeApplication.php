<?php

namespace App\ListNode;

class DataStructureListNodeApplication
{
    /**
     * Definition for a singly-linked list.
     * class ListNode {
     *     public $val = 0;
     *     public $next = null;
     *     function __construct($val) { $this->val = $val; }
     * }
     */

    /**
     * @param SingleLinkListNode $head
     * @return SingleLinkListNode
     */
    public function reverseListNode(SingleLinkListNode $head)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }

        $newHead = $pre = null;

        $cur = $head;

        while ($cur != null) {
            $next = $cur->next;
            if ($next == null) {
                // 当前节点为最后一个节点
                $newHead = $cur;
            }
            $cur->next = $pre;
            $pre = $cur;
            $cur = $next;
        }
        return $newHead;
    }

    /**
     * @desc 递归
     *
     * @param SingleLinkListNode $head
     * @return SingleLinkListNode
     */
    public function reverseListNode1(SingleLinkListNode $head)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }
        $res = $this->reverseListNode1($head->next);
        $head->next->next = $head;
        $head->next = null;
        return $res;
    }

    /**
     * @desc 合并两个有序链表
     *
     * @param SingleLinkListNode $l1
     * @param SingleLinkListNode $l2
     * @return null
     */
    public function mergeTwoLists(SingleLinkListNode $l1, SingleLinkListNode $l2)
    {
        // 合并后新链表的哨兵节点
        $newHead = new SingleLinkListNode(0);

        // 游标指针
        $cur = $newHead;

        while ($l1 && $l2) {
            if ($l1->data > $l2->data) {
                $cur->next = $l1;
                $l1 = $l1->next;
            } else {
                $cur->next = $l2;
                $l2 = $l2->next;
            }
            // 当前指针后羿
            $cur = $cur->next;
        }

        // 链表长度不一样, 拼接剩下部分
        if ($l1) {
            $cur->next = $l1;
        }
        if ($l2) {
            $cur->next = $l2;
        }
        return $newHead->next;
    }

    public function checkCircle()
    {

    }

    /**
     * @desc 删除链表的倒数第n个节点, n保证是有效的
     *
     * @param SingleLinkListNode $head
     * @param $n
     * @return SingleLinkListNode|bool|null
     */
    public function delN(SingleLinkListNode $head, $n)
    {
        if ($head == null || $n < 1) {
            return false;
        }

        // 哨兵节点, 边界问题, 第一个节点 & 最后一个节点
        $newNode = New SingleLinkListNode(0);
        $newNode->next = $head;

        $fast  = $slow = $newNode;
        for ($i=0; $i<$n; $i++) {
            $fast = $fast->next;
        }
        while ($fast->next != null) {
            $fast = $fast->next;
            $slow = $slow->next;
        }
        // 找到待删除节点的前驱节点, 删除之
        $slow->next = $slow->next->next;
        return $newNode->next;
    }

    /**
     * @desc 获取链表倒数第n个节点
     *
     * @param SingleLinkListNode $head
     * @param $n
     * @return SingleLinkListNode|bool|null
     */
    public function getN(SingleLinkListNode $head, $n)
    {
        if ($head == null || $n < 1) {
            return false;
        }

        $fast = $slow = $head;
        for ($i=0; $i<$n-1; $i++){
            $fast = $fast->next;
        }
        while ($fast->next != null) {
            $fast = $fast->next;
            $slow = $slow->next;
        }
        return $slow;
    }

    /**
     * @desc 获取链表的中间节点 快慢指针 && 先计算链表长度length, 然后获取 length/2 节点
     *
     * @param SingleLinkListNode $head
     * @return SingleLinkListNode|null
     */
    public function getMiddleNode(SingleLinkListNode $head)
    {
        if ($head == null) {
            return $head;
        }
        $fast = $slow = $head;
        while ($fast->next != null) {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        return $slow;
    }

}