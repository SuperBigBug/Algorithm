<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/15
 * Time: 11:12 AM
 */

class KthToLast
{
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
// ? 34 ? 0


    //leetcode submit region begin(Prohibit modification and deletion)
    /**
     * Definition for a singly-linked list.
     * class ListNode {
     *     public $val = 0;
     *     public $next = null;
     *     function __construct($val) { $this->val = $val; }
     * }
     */

    function kthTolLast($head, $k) {
        if ($head == null || $k <= 0){
            return false;
        }

        $fast = $flow = $head;

        for ($i=0; $i<$k-1; $i++){
            if ($fast->next != null) {
                $fast = $fast->next;
            }else{
                return false;
            }
        }

        while($fast->next != null) {
            $fast = $fast->next;
            $flow = $flow->next;
        }
        return $flow->val;
    }
}