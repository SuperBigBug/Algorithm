<?php

class MergeTwoLists
{
    /**
     * 将两个升序链表合并为一个新的 升序 链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。 
     *   示例：

     *  输入：1->2->4, 1->3->4
     *  输出：1->1->2->3->4->4
     */

     /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $newHead = new ListNode();
        $cur = $newHead;

        while($l1 !== null && $l2 !== null) {
            if($l1->val <= $l2->val) {
                $cur->next = $l1;
                $l1 = $l1->next;
            }else{
                $cur->next = $l2;
                $l2 = $l2->next;
            }
            $cur = $cur->next;
        }
        
        if($l1 === null) {
            $cur->next = $l2;
        }else{
            $cur->next = $l1;
        }

        return $newHead->next;
    }
}

class ListNode
{
    
}