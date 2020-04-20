<?php

/**
 * 200. 岛屿数量
 * Class NumIslandsSolution
 * https://leetcode-cn.com/problems/number-of-islands/
 */
class NumIslandsSolution
{

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid)
    {
        $res = 0;
        for ($y = 0; $y < count($grid); $y++) {
            for ($x = 0; $x < count($grid[$y]); $x++) {
                if ($grid[$y][$x] == "1") {
                    $res++;
                    $land = [[$x, $y]];
                    while (!empty($land)) {
                        list($lx, $ly) = array_shift($land);
                        if (isset($grid[$ly + 1][$lx]) && $grid[$ly + 1][$lx] == "1") {
                            $land[] = [$lx, $ly + 1];
                            $grid[$ly + 1][$lx] = "2";
                        }
                        if (isset($grid[$ly - 1][$lx]) && $grid[$ly - 1][$lx] == "1") {
                            $land[] = [$lx, $ly - 1];
                            $grid[$ly - 1][$lx] = "2";
                        }
                        if (isset($grid[$ly][$lx + 1]) && $grid[$ly][$lx + 1] == "1") {
                            $land[] = [$lx + 1, $ly];
                            $grid[$ly][$lx + 1] = "2";
                        }
                        if (isset($grid[$ly][$lx - 1]) && $grid[$ly][$lx - 1] == "1") {
                            $land[] = [$lx - 1, $ly];
                            $grid[$ly][$lx - 1] = "2";
                        }
                    }
                }
            }
        }
        return $res;
    }
}