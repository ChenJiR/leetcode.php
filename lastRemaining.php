<?php

/**
 * 1579. 面试题62. 圆圈中最后剩下的数字
 * Class LastRemainingSolution
 * https://leetcode-cn.com/problems/yuan-quan-zhong-zui-hou-sheng-xia-de-shu-zi-lcof/
 */
class LastRemainingSolution
{

    /**
     * 暴力模拟 超时解
     * @param Integer $n
     * @param Integer $m
     * @return Integer
     */
    function lastRemaining($n, $m)
    {
        $list = range(0, $n - 1);
        $i = 0;
        while ($n > 1) {
            $i = ($i + $m - 1) % $n;
            array_splice($list, $i, 1);
            $n--;
        }
        return $list[0];
    }

    /**
     * 反推法
     * 由最后结果反推，求每次结果在数组的位置
     * @param Integer $n
     * @param Integer $m
     * @return Integer
     */
    function lastRemaining2($n, $m)
    {
        $res = 0;
        for ($i = 2; $i <= $n; $i++) {
            $res = ($res + $m) % $i;
        }
        return $res;
    }
}