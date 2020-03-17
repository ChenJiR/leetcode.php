<?php

/**
 * 1503. 面试题09. 用两个栈实现队列
 * PHP没有栈的概念。。直接用数组进行操作，这里直接用了数组的原生API
 * Class CQueue
 * https://leetcode-cn.com/problems/yong-liang-ge-zhan-shi-xian-dui-lie-lcof/
 */
class CQueue
{
    private $ary = [];

    /**
     */
    function __construct()
    {
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function appendTail($value)
    {
        $this->ary[] = $value;
    }

    /**
     * @return Integer
     */
    function deleteHead()
    {
        return array_shift($this->ary) ?: -1;
    }
}