<?php

//ʵ��һ���㷨���ҳ����������е����� k ���ڵ㡣���ظýڵ��ֵ��
//
// ע�⣺�������ԭ�������Ķ�
//
// ʾ����
//
// ���룺 1->2->3->4->5 �� k = 2
//����� 4
//
// ˵����
//
// ������ k ��֤����Ч�ġ�
// Related Topics ���� ˫ָ��
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