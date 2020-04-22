<?php

/**
 * 1029. 两地调度
 * Class TwoCitySchedCostSolution
 * https://leetcode-cn.com/problems/two-city-scheduling/
 */
class TwoCitySchedCostSolution
{

    /**
     * @param Integer[][] $costs
     * @return Integer
     */
    function twoCitySchedCost($costs)
    {
        usort($costs, function ($a, $b) {
            return ($a[0] - $a[1]) <= ($b[0] - $b[1]) ? -1 : 1;
        });
        $total = 0;
        $n = count($costs) / 2;
        for ($i = 0; $i < $n; $i++) {
            $total += $costs[$i][0] + $costs[$i + $n][1];
        }
        return $total;
    }
}
