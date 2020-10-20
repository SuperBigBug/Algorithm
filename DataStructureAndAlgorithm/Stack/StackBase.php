<?php

namespace App\Stack;

class StackBase
{
    // ������ʵ��һ��ջ
    public $stack = [];
    // ջ�Ĵ�С
    public $size = 100;
    // ��ǰջ��Ԫ�ظ���
    public $count;

    /**
     * @desc ��ջ
     *
     * @param $item
     * @return bool
     */
    public function push($item)
    {
        if ($this->count >= $this->size || empty($item)) {
            return false;
        }
        $this->stack[$this->count] = $item;
        // ����ջ��Ԫ�ظ���
        $this->count++;
        return true;
    }

    /**
     * @desc ��ջ
     *
     * @return bool|mixed
     */
    public function pop()
    {
        if ($this->count == 0) {
            return false;
        }
        $res = $this->stack[$this->count-1];
        // ɾ��֮
        unset($this->stack[$this->count-1]);
        // ���³���
        $this->count--;
        return $res;
    }
}