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
}