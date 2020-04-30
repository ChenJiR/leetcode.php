<?php

/**
 * 202. 快乐数
 * Class IsHappySolution
 * https://leetcode-cn.com/problems/happy-number/
 */
class IsHappySolution
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isHappy($n)
    {
        $fun = function ($n) {
            $res = 0;
            for ($i = 0; $i < strlen($n); $i++) {
                $res += $n[$i] * $n[$i];
            }
            return $res;
        };
        $tmp = [];
        while ($n != 1 && !in_array($n, $tmp)) {
            $tmp[] = $n;
            $n = $fun(strval($n));
        }
        return $n == 1;
    }
}