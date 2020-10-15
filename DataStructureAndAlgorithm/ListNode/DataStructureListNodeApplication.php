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


    public function mergeTwoLists(SingleLinkedList $list1, SingleLinkedList $list2)
    {

    }

    // 链表中环路检测
    public function checkCircle()
    {

    }

    public function deleteN()
    {

    }
    // 获取中间节点
    public function getMiddleNode()
    {
        
    }

}