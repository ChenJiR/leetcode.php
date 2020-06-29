<?php

/**
 * 1521. 剑指 Offer 09. 用两个栈实现队列
 * Class CQueue
 * https://leetcode-cn.com/problems/yong-liang-ge-zhan-shi-xian-dui-lie-lcof/
 */
class CQueue
{
    private $stack_1 = [];

    private $stack_2 = [];

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
        $this->stack_1[] = $value;
    }

    /**
     * @return Integer
     */
    function deleteHead()
    {
        if (empty($this->stack_2)) {
            if (empty($this->stack_1)) {
                return -1;
            } else {
                while (!empty($this->stack_1)) {
                    $this->stack_2[] = array_pop($this->stack_1);
                }
            }
        }
        return array_pop($this->stack_2);
    }
}