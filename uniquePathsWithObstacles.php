<?php

/**
 * 63. 不同路径 II
 * Class UniquePathsWithObstaclesSolution
 * https://leetcode-cn.com/problems/unique-paths-ii/
 */
class UniquePathsWithObstaclesSolution
{

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid)
    {
        $dp = [];
        foreach ($obstacleGrid as $y => $line) {
            foreach ($line as $x => $item) {
                if ($x == 0 && $y == 0) {
                    $dp[$y][$x] = $item == 1 ? 0 : 1;
                    continue;
                }
                $dp[$y][$x] = $item == 1
                    ? 0
                    : (($dp[$y - 1][$x] ?: 0) + ($dp[$y][$x - 1] ?: 0));
            }
        }

        return $dp[$y][$x];
    }
}