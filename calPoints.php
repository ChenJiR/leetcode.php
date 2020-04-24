<?php

/**
 * 682. 棒球比赛
 * Class CalPointsSolution
 * https://leetcode-cn.com/problems/baseball-game/
 */
class CalPointsSolution
{

    /**
     * 使用数组模拟栈
     * @param String[] $ops
     * @return Integer
     */
    function calPoints_1($ops)
    {
        $tmp = [];
        foreach ($ops as $item) {
            switch ($item) {
                case "+":
                    $end = count($tmp) - 1;
                    $tmp[] = $tmp[$end] + $tmp[$end - 1];
                    break;
                case "D":
                    $tmp[] = 2 * (end($tmp) ?: 0);
                    break;
                case "C":
                    array_pop($tmp);
                    break;
                default:
                    $tmp[] = $item;
                    break;
            }
        }
        return array_sum($tmp);
    }

    /**
     * 使用SPL栈
     * @param String[] $ops
     * @return Integer
     */
    function calPoints_2($ops)
    {
        $tmp = new SplStack();
        foreach ($ops as $item) {
            switch ($item) {
                case "+":
                    $end_1 = $tmp->pop();
                    $end_2 = $tmp->top();
                    $tmp->push($end_1);
                    $tmp->push($end_1 + $end_2);
                    break;
                case "D":
                    $tmp->push(2 * $tmp->top());
                    break;
                case "C":
                    $tmp->pop();
                    break;
                default:
                    $tmp->push($item);
                    break;
            }
        }
        $res = 0;
        while (!$tmp->isEmpty()) {
            $res += $tmp->pop();
        }
        return $res;
    }
}