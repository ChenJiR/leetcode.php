<?php

/**
 * 509. 斐波那契数
 * Class FibSolution
 * https://leetcode-cn.com/problems/fibonacci-number/
 */
class FibSolution
{

    private $fib_dic = [0 => 0, 1 => 1];

    /**
     * @param Integer $N
     * @return Integer
     */
    function fib($N)
    {
        if (in_array($N, $this->fib_dic)) {
            return $this->fib_dic[$N];
        }
        $res = $this->fib($N - 1) + $this->fib($N - 2);
        $this->fib_dic[$N] = $res;
        return $res;
    }
}