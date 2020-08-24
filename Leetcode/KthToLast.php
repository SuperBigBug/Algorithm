<?php

class KthToLast
{
    /**
     * @desc 实现一种算法，找出单向链表中倒数第 k 个节点。返回该节点的值。
     * @param $head
     * @param $k
     * @return mixed
     */
    public function test($head, $k)
    {
        if ($head == null) {
            return $head;
        }

        $fast = $slow = $head;
        for ($i=0; $i<$k-1; $i++){
            $fast = $fast->next;
        }
        while($fast->next != null) {
            $fast = $fast->next;
            $slow = $slow->next;
        }
        return $slow->val;
    }
}