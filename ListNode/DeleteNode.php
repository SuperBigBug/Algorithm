<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/15
 * Time: 4:22 PM
 */

class DeleteNode
{
    //���дһ��������ʹ�����ɾ��ĳ�������и����ģ���ĩβ���ڵ㣬�㽫ֻ������Ҫ��ɾ���Ľڵ㡣
//
// ����һ������ -- head = [4,5,1,9]�������Ա�ʾΪ:
//
//
//
//
//
// ʾ�� 1:
//
// ����: head = [4,5,1,9], node = 5
//���: [4,1,9]
//����: ������������ֵΪ?5?�ĵڶ����ڵ㣬��ô�ڵ�������ĺ���֮�󣬸�����Ӧ��Ϊ 4 -> 1 -> 9.
//
//
// ʾ�� 2:
//
// ����: head = [4,5,1,9], node = 1
//���: [4,5,9]
//����: ������������ֵΪ?1?�ĵ������ڵ㣬��ô�ڵ�������ĺ���֮�󣬸�����Ӧ��Ϊ 4 -> 5 -> 9.
//
//
//
//
// ˵��:
//
//
// �������ٰ��������ڵ㡣
// ���������нڵ��ֵ����Ψһ�ġ�
// �����Ľڵ�Ϊ��ĩβ�ڵ㲢��һ���������е�һ����Ч�ڵ㡣
// ��Ҫ����ĺ����з����κν����
//
// Related Topics ����
// ? 716 ? 0


//leetcode submit region begin(Prohibit modification and deletion)
    /**
     * Definition for a singly-linked list.
     * class ListNode {
     *     public $val = 0;
     *     public $next = null;
     *     function __construct($val) { $this->val = $val; }
     * }
     */

    function deleteNode($node) {
        $node->val = $node->next->val;
        $node->next = $node->next->next;
    }

}