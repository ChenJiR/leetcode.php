<?php

/**
 * 1558. 面试题59 - II. 队列的最大值
 * Class MaxQueue
 * https://leetcode-cn.com/problems/dui-lie-de-zui-da-zhi-lcof/
 */
class MaxQueue {
    private $list = [];

    private $max;

    /**
     * @param array $arr
     */
    function __construct($arr=[]) {
        $this->list = $arr;
        $this->max = max($arr);
    }

    /**
     * @return Integer
     */
    function max_value() {
        return $this->max ?: -1;
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function push_back($value) {
        array_unshift($this->list,$value);
        $this->max = $value > $this->max ? $value : $this->max;
    }

    /**
     * @return Integer
     */
    function pop_front() {
        if(empty($this->list)){
            $this->max = null;
            return -1;
        }
        $result = array_pop($this->list) ?: -1;
        if($this->max === $result){
            $this->max = max($this->list);
        }
        return $result;
    }
}

/**
 * Your MaxQueue object will be instantiated and called as such:
 * $obj = MaxQueue();
 * $ret_1 = $obj->max_value();
 * $obj->push_back($value);
 * $ret_3 = $obj->pop_front();
 */