<?php

/**
 * 155. 最小栈
 * Class MinStack
 * https://leetcode-cn.com/problems/min-stack
 */
class MinStack
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->data[] = [$x, empty($this->data) ? $x : min(end($this->data)[1], $x)];
    }

    /**
     * @return NULL
     */
    function pop()
    {
        array_pop($this->data);
    }

    /**
     * @return Integer
     */
    function top()
    {
        return end($this->data)[0];
    }

    /**
     * @return Integer
     */
    function getMin()
    {
        return end($this->data)[1];
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */

$obj = new MinStack();
$obj->push(-2);
$obj->push(0);
$obj->push(-3);
