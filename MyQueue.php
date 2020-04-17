<?php

/**
 * 1437. 面试题 03.04. 化栈为队
 * Class MyQueue
 * https://leetcode-cn.com/problems/implement-queue-using-stacks-lcci/
 */
class MyQueue
{

    private $s1 = [];

    private $s2 = [];

    /**
     * Initialize your data structure here.
     */
    function __construct()
    {
    }

    /**
     * Push element x to the back of queue.
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        array_push($this->s1, $x);
    }

    /**
     * Removes the element from in front of queue and returns that element.
     * @return Integer
     */
    function pop()
    {
        if (empty($this->s2)) {
            while (count($this->s1) > 0) {
                array_push($this->s2, array_pop($this->s1));
            }
        }
        return array_pop($this->s2);
    }

    /**
     * Get the front element.
     * @return Integer
     */
    function peek()
    {
        if (empty($this->s2)) {
            while (count($this->s1) > 0) {
                array_push($this->s2, array_pop($this->s1));
            }
        }
        return end($this->s2);
    }

    /**
     * Returns whether the queue is empty.
     * @return Boolean
     */
    function empty()
    {
        return empty($this->s1) && empty($this->s2);
    }

}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */