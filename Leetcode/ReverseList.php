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
}