<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
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
}