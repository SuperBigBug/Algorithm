<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class ReverseList {

    /**
     * @desc µü´ú
     * @param ListNode $head
     * @return ListNode
     */
    public function reverseList1($head) {
        $reverseHead = $pre = null;
        $cur = $head;

        while ($cur != null) {
            $next = $cur->next;
            if ($next == null) {
                $reverseHead = $cur;
            }
            $cur->next = $pre;
            $pre = $cur;
            $cur = $next;
        }
        return $reverseHead;
    }

    /**
     * @desc µÝ¹é
     * @param $head
     * @return mixed
     */
    function reverseList2($head)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }
        $res = $this->reverseList2($head->next);
        $head->next->next = $head;
        $head->next = null;
        return $res;
    }
}