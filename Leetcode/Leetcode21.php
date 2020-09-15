<?php

//��������������ϲ�Ϊһ���µ� ���� �������ء���������ͨ��ƴ�Ӹ�����������������нڵ���ɵġ�
//
//
//
// ʾ����
//
// ���룺1->2->4, 1->3->4
//�����1->1->2->3->4->4
//
// Related Topics ����
// ? 1264 ? 0


//leetcode submit region begin(Prohibit modification and deletion)
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */

class Leetcode21
{
    function resolve($l1, $l2)
    {
        // ĳһ������Ϊ��
        if ($l1 == null) {
            return $l2;
        }
        if ($l2 == null) {
            return $l1;
        }

        $newLink = new ListNode();
        $cur = $newLink;

        while ($l1 != null && $l2 != null) {
            if ($l1->val > $l2->val) {
                $cur->next = $l2;
                $l2 = $l2->next;
            }else{
                $cur->next = $l1;
                $l1 = $l1->next;
            }

            // ������ָ�����
            $cur = $cur->next;
        }

        if ($l1 == null) {
            $cur->next = $l2;
        }else if ($l2 == null) {
            $cur->next = $l1;
        }
        return $newLink;
    }
}