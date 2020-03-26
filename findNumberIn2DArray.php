<?php

/**
 * 240. 搜索二维矩阵 II
 * 1504. 面试题04. 二维数组中的查找
 * Class FindNumberIn2DArraySolution
 * https://leetcode-cn.com/problems/er-wei-shu-zu-zhong-de-cha-zhao-lcof/
 * https://leetcode-cn.com/problems/search-a-2d-matrix-ii/
 */
class FindNumberIn2DArraySolution
{

    /**
     * 将二维数组当作二叉树进行 BFS 复杂度为 O(mn)
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function findNumberIn2DArray($matrix, $target)
    {
        $x = $y = 0;
        $ary = [[$x, $y]];
        while (!empty($ary)) {
            list($x, $y) = array_shift($ary);
            $item = $matrix[$x][$y];
            if ($item === $target) {
                return true;
            }
            if ($item < $target) {
                isset($matrix[$x + 1][$y]) && !in_array([$x + 1, $y], $ary) && $ary[] = [$x + 1, $y];
                isset($matrix[$x][$y + 1]) && !in_array([$x, $y + 1], $ary) && $ary[] = [$x, $y + 1];
            }
        }
        return false;
    }

    /**
     * 暴力剪枝
     * 暴力法优化，但复杂度仍为 O(mn)
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function findNumberIn2DArray2($matrix, $target)
    {
        foreach ($matrix as $i => $line) {
            foreach ($line as $j => $item) {
                if ($item == $target) {
                    return true;
                }
                if ($item > $target) {
                    continue;
                }
            }
        }
        return false;
    }

    /**
     * 线性查找 O(m+n)
     * 利用二维数组具备每行从左到右递增以及每列从上到下递增的特点
     * 可以从左下或右上开始查找，因为每一横列 + 纵列 组成的数列总是递增的
     * 以左下为例，元素大于target则向上查找，小于target则向右查找
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function findNumberIn2DArray3($matrix, $target)
    {
        $x = 0;
        $y = count($matrix) - 1;
        while (isset($matrix[$x][$y])) {
            if ($matrix[$y][$x] > $target) {
                $y--;
            }
            if ($matrix[$y][$x] < $target) {
                $x++;
            } else {
                return true;
            }
        }
        return false;
    }
}