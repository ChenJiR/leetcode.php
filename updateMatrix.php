<?php

/**
 * 542. 01 矩阵
 * Class UpdateMatrixSolution
 * https://leetcode-cn.com/problems/01-matrix/
 */
class UpdateMatrixSolution
{

    /**
     * BFS
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    function updateMatrix($matrix)
    {
        //收集所有0元素坐标并将所有1元素设为-1
        $ary = [];
        foreach ($matrix as $y => &$line) {
            foreach ($line as $x => &$item) {
                $item === 0 ? $ary[] = [$x, $y] : $item = -1;
            }
        }
        $i = 1;
        while (!empty($ary)) {
            $floor = [];
            foreach ($ary as list($x, $y)) {
                if (isset($matrix[$y - 1][$x]) && $matrix[$y - 1][$x] == -1) {
                    $matrix[$y - 1][$x] = $i;
                    $floor[] = [$x, $y - 1];
                }
                if (isset($matrix[$y + 1][$x]) && $matrix[$y + 1][$x] == -1) {
                    $matrix[$y + 1][$x] = $i;
                    $floor[] = [$x, $y + 1];
                }
                if (isset($matrix[$y][$x - 1]) && $matrix[$y][$x - 1] == -1) {
                    $matrix[$y][$x - 1] = $i;
                    $floor[] = [$x - 1, $y];
                }
                if (isset($matrix[$y][$x + 1]) && $matrix[$y][$x + 1] == -1) {
                    $matrix[$y][$x + 1] = $i;
                    $floor[] = [$x + 1, $y];
                }
            }
            $ary = $floor;
            $i++;
        }
        return $matrix;
    }
}

var_dump((new UpdateMatrixSolution())->updateMatrix([[0, 0, 0], [0, 1, 0], [1, 1, 1]]));