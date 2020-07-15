<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/15
 * Time: 7:55 PM
 */
class DeleteDuplicates
{
    //给定一个排序链表，删除所有重复的元素，使得每个元素只出现一次。
//
// 示例 1:
//
// 输入: 1->1->2
//输出: 1->2
//
//
// 示例 2:
//
// 输入: 1->1->2->3->3
//输出: 1->2->3
// Related Topics 链表
// 👍 345 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
    /**
     * Definition for a singly-linked list.
     * class ListNode {
     *     public $val = 0;
     *     public $next = null;
     *     function __construct($val) { $this->val = $val; }
     * }
     */

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head) {
        if($head == null || $head->next == null) {
            return $head;
        }
        $cur = $head;
        while($cur->next != null) {
            if($cur->val == $cur->next->val) {
                $cur->next = $cur->next->next;
            }else{
                $cur = $cur->next;
            }

        }
        return $head;
    }
//leetcode submit region end(Prohibit modification and deletion)

}