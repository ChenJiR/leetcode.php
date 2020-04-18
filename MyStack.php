<?php

/**
 * 225. 用队列实现栈
 * Class MyStack
 * https://leetcode-cn.com/problems/implement-stack-using-queues/
 */
class MyStack
{
    /**
     * @var SplQueue
     */
    private $l1;
    /**
     * @var SplQueue
     */
    private $l2;


    /**
     * Initialize your data structure here.
     */
    function __construct()
    {
        $this->l1 = new SplQueue();
        $this->l2 = new SplQueue();
    }

    /**
     * Push element x onto stack.
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->l1->push($x);
    }

    /**
     * Removes the element on top of the stack and returns that element.
     * @return Integer
     */
    function pop()
    {
        while ($this->l1->count() > 1) {
            $this->l2->push($this->l1->shift());
        }
        list($this->l1, $this->l2) = [$this->l2, $this->l1];
        return $this->l2->shift();
    }

    /**
     * Get the top element.
     * @return Integer
     */
    function top()
    {
        while ($this->l1->count() > 0) {
            $top = $this->l1->shift();
            $this->l2->push($top);
        }
        list($this->l1, $this->l2) = [$this->l2, $this->l1];
        return $top;
    }

    /**
     * Returns whether the stack is empty.
     * @return Boolean
     */
    function empty()
    {
        return $this->l1->isEmpty();
    }
}

/**
 * Your MyStack object will be instantiated and called as such:
 * $obj = MyStack();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->empty();
 */
