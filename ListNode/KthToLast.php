<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/15
 * Time: 11:12 AM
 */

class KthToLast
{
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