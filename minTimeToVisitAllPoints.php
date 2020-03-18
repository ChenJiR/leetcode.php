<?php

/**
 * 1266. 访问所有点的最小时间
 * Class MinTimeToVisitAllPointsSolution
 * https://leetcode-cn.com/problems/minimum-time-visiting-all-points/
 */
class MinTimeToVisitAllPointsSolution
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function minTimeToVisitAllPoints($points)
    {
        $res = 0;
        $prev_point = null;
        foreach ($points as $point) {
            if ($prev_point) {
                $res += max(abs($point[0] - $prev_point[0]), abs($point[1] - $prev_point[1]));
            }
            $prev_point = $point;
        }
        return $res;
    }
}

$points = [[1,1],[3,4],[-1,0]];
var_dump((new MinTimeToVisitAllPointsSolution())->minTimeToVisitAllPoints($points));