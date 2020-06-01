<?php

/**
 * 1662.面试题64. 求1+2+…+n
 * Class SumNumsSolution
 * https://leetcode-cn.com/problems/qiu-12n-lcof/
 */
class SumNumsSolution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function sumNums($n)
    {
        $res = 0;
        $n && $res = $n + $this->sumNums($n - 1);
        return $res;
    }
}