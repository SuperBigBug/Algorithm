<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/9/4
 * Time: 3:20 PM
 */

class Lru
{
    private $capacity;
    private $list;

    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->list = new HashList();
    }

    public function get($key)
    {
        if ($key < 0) return -1;
        return $this->list->get($key);
    }

    public function insert($key, $value)
    {
        $size = $this->list->size;

        $exists = $this->list->checkKey($key);
        if ($exists || $size+1 > $this->capacity) {
            $this->list->rmNode($key);
        }
        $this->list->addAsHead($key, $value);
    }

}

class Node
{
    public $key;
    public $val;
    public $next;
    public $pre;

    public function __construct($val)
    {
        $this->val = $val;
    }
}

class HashList
{
    // 头指针
    public $head;
    // 尾指针
    public $tail;
    // 表大小
    public $size;
    public $buckets = [];


    public function __construct($head =null, $tail=null)
    {
        $this->head = $head;
        $this->tail = $tail;
        $this->size = 0;
    }

    public function checkKey($key)
    {
        $res = $this->buckets[$key];
        if(!$res) {
            return false;
        }
        return true;
    }

    public function get($key)
    {
        $res = $this->buckets[$key];
        if (!$res){
            return -1;
        }
        $this->moveToHead($res);
        return $res->val;
    }

    public function moveToHead(Node $node)
    {
        if ($node == $this->head) {
            return true;
        }

        $node->pre->next = $node->next;
        $node->next->pre = $node->pre;

        $node->next = $this->head;
        $this->head->pre = $node;
        $this->head = $node;
        $node->pre = null;
        return true;
    }

    // 添加元素到头部
    public function addAsHead($key, $value)
    {
        $node = new Node($value);
        if ($this->head != null && $this->tail == null) {

            $this->tail = $this->head;
            $this->tail->next = null;
            $this->tail->pre = $node;
        }
        $node->pre = null;
        $node->next = $this->head;
        $this->head->pre = $node;
        $this->head = $node;
        $node->key = $key;
        $this->buckets[$key] = $node;
        $this->size++;
    }

    // 移除
    public function rmNode($key)
    {
        $cur = $this->head;

        for ($i=1; $i<$this->size; $i++) {
            if ($cur->key == $key) {
                break;
            }
            $cur = $cur->next;
        }

        unset($this->buckets[$cur->key]);

        if ($cur->pre == null) {
            $cur->next->pre = null;
            $this->head = $cur->next;
        }else if ($cur->next == null) {
            $cur->pre->next = null;
            $cur = $cur->pre;
            $this->tail = $cur;
        }else{
            $cur->pre->next = $cur->next;
            $cur->nex->pre = $cur->pre;
            $cur = null;
        }
        $this->size--;
    }



}