<?php

/**
 * 739. 每日温度
 * Class DailyTemperaturesSolution
 * https://leetcode-cn.com/problems/daily-temperatures/
 */
class DailyTemperaturesSolution
{

    /**
     * @param Integer[] $T
     * @return Integer[]
     */
    function dailyTemperatures($T)
    {
        $tmp = $res = [];
        for ($i = 0; $i < count($T); $i++) {
            $res[$i] = 0;
            while (!empty($tmp) && $T[$i] > $T[end($tmp)]) {
                $end = array_pop($tmp);
                $res[$end] = $i - $end;
            }
            $tmp[] = $i;
        }
        return $res;
    }
}