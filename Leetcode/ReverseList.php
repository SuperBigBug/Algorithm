<?php

class ReverseList
{
    public function method_1($head)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }
        $res = $this->method_1($head->next);
        $head->next->next = $head;
        $head->next  = null;
        return $res;
    }

    public function method_2($head){
        if ($head == null || $head->next == null) {
            return $head;
        }
        $newHead = null;
        $pre = null;

        $cur = $head;

        while ($cur != null) {
            $next = $cur->next;
            if ($next == null) {
                $newHead = $cur;
            }
            $cur->next = $pre;
            $pre = $cur;
            $cur = $next;
        }
        return $newHead;
    }

    public function ss($head) {
        if ($head == null || $head->next == null) {
            return $head;
        }

        $newHead = $pre = null;

        $cur = $head;
        while ($cur != null) {
            $next = $cur->next;
            // 当前节点为最后一个节点
            if ($next == null) {
                $newHead = $cur;
            }
            $cur->next = $pre;
            $pre = $cur;
            $cur = $next;
        }
        return $newHead;
    }

    public function sss($head)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }

        $res = $this->sss($head->next);
        $head->next->next = $head;
        $head->next = null;
        return $res;
    }
}