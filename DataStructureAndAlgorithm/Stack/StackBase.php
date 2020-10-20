<?php

namespace App\Stack;

class StackBase
{
    // 用数组实现一个栈
    public $stack = [];
    // 栈的大小
    public $size = 100;
    // 当前栈中元素个数
    public $count;

    /**
     * @desc 入栈
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
        // 更新栈内元素个数
        $this->count++;
        return true;
    }

    /**
     * @desc 出栈
     *
     * @return bool|mixed
     */
    public function pop()
    {
        if ($this->count == 0) {
            return false;
        }
        $res = $this->stack[$this->count-1];
        // 删除之
        unset($this->stack[$this->count-1]);
        // 更新长度
        $this->count--;
        return $res;
    }
}