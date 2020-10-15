<?php

namespace App\ListNode;

/**
 * Class SingleLinkedList
 * @package App\ListNode
 */
class SingleLinkedList
{
    /**
     * @desc 单链表头结点(哨兵节点)
     * @var
     */
    public $head;

    /**
     * @desc 单链表大小
     * @var
     */
    public $size;

    /**
     * @desc 初始化单链表
     *
     * SingleLinkedList constructor.
     * @param null $head
     */
    public function __construct($head = null)
    {
        if ($head == null) {
            $this->head = new SingleLinkListNode();
        } else {
            $this->head = $head;
        }
        $this->size = 0;
    }

    /**
     * @desc 获取链表长度
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    // todo
    public function insert($data)
    {

    }

    // todo
    public function delete(SingleLinkedList $node)
    {

    }

    // todo
    public function getNodeByIndex($index)
    {

    }

    // todo
    public function getPreNode(SingleLinkedList $node)
    {

    }

    // todo
    public function printList()
    {

    }

    public function insertNodeAfter(SingleLinkedList $node, $data)
    {

    }
}