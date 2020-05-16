<?php

/**
 * Created by PhpStorm.
 * Definition for a singly-linked list.
 * User: q8270
 * Date: 2020-03-12
 * Time: 10:13
 */
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }

    /**
     * 数组转换为单向链表
     * @param array $ary
     * @return ListNode
     */
    static function arrayToList(array $ary)
    {
        $cur = new static(null);
        $res = $cur;
        while (!empty($ary)) {
            $node = new static(array_shift($ary));
            $cur->next = $node;
            $cur = $cur->next;
        }
        return $res->next;
    }

    /**
     * 单向链表转换数组
     * @param ListNode $listNode
     * @return array
     */
    static function listToArray($listNode)
    {
        $res = [];
        while ($listNode) {
            $res[] = $listNode->val;
            $listNode = $listNode->next;
        }
        return $res;
    }

    /**
     * 打印链表
     * @param ListNode $listNode
     */
    static function printList(ListNode $listNode)
    {
        echo "listNode: [" . implode(",", static::listToArray($listNode)) . "]";
    }
}