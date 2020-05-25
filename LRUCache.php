<?php


/**
 * 146. LRU缓存机制
 * Class LRUCache
 * https://leetcode-cn.com/problems/lru-cache/
 */
class LRUCache
{
    private $capacity;

    private $data = [];
    /**
     * @var DlinkNode
     */
    private $head = null;
    /**
     * @var DlinkNode
     */
    private $tail = null;

    /**
     * @param Integer $capacity
     */
    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->head = new DlinkNode(null, null);
        $this->tail = new DlinkNode(null, null);
        $this->head->prev = $this->tail;
        $this->tail->next = $this->head;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    public function get($key)
    {
        if (isset($this->data[$key])) {
            $node = $this->data[$key];
            $this->moveToHead($node);
            return $node->value;
        } else {
            return -1;
        }
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    public function put($key, $value)
    {
        if (isset($this->data[$key])) {
            $node = $this->data[$key];
            $node->value = $value;
            $this->moveToHead($node);
        } else {
            if (count($this->data) >= $this->capacity) {
                $shiftnode = $this->shift();
                unset($this->data[$shiftnode->key]);
            }
            $this->data[$key] = new DlinkNode($key, $value);
            $this->push($this->data[$key]);
        }
    }

    private function remove(DlinkNode $node)
    {
        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
    }

    private function moveToHead(DlinkNode $node)
    {
        $this->remove($node);
        $this->push($node);
    }

    /**
     * @return DlinkNode
     */
    private function shift()
    {
        $node = $this->tail->next;
        $this->remove($node);
        return $node;
    }

    private function push($node)
    {
        $node->next = $this->head;
        $node->prev = $this->head->prev;
        $this->head->prev->next = $node;
        $this->head->prev = $node;
    }
}

/**
 * 双向链表
 * Class DlinkNode
 */
class DlinkNode
{
    //用于出队列时查找要删掉的data中的key
    public $key;
    public $value;
    public $prev;
    public $next;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}