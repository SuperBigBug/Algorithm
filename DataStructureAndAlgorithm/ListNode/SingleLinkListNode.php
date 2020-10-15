<?php

namespace App\ListNode;

/**
 * Class LinkListNode
 * @package App\ListNode
 */
class SingleLinkListNode
{
    /**
     * @desc 节点中的数据域
     * @var null
     */
    public $data;

    /**
     * @desc 节点中的指针域, 指向下一个节点
     * @var null
     */
    public $next;

    /**
     * LinkListNode constructor.
     * @param null $data
     */
    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}