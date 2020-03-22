<?php

/**
 * 1560. 面试题56 - I. 数组中数字出现的次数
 * Class MaxValueSolution
 * https://leetcode-cn.com/problems/shu-zu-zhong-shu-zi-chu-xian-de-ci-shu-lcof/
 */
class MaxValueSolution
{

    private $grid;
    private $max_value = PHP_INT_MIN;

    /**
     * DP
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxValue($grid)
    {
//        $this->grid = $grid;
//        $this->getValue(0, 0, 0);
//        return $this->max_value;

        $m = count($grid) - 1;
        $n = count($grid[0]) - 1;
        for ($i = 0; $i <= $m; $i++) {
            for ($k = 0; $k <= $n; $k++) {
                $grid[$i][$k] = max($grid[$i][$k - 1] ?: 0, isset($grid[$i - 1]) ? $grid[$i - 1][$k] : 0) + $grid[$i][$k];
            }
        }
        return $grid[$m][$n];
    }

    /**
     * 递归 超时解
     * @param $row
     * @param $column
     * @param $value
     */
    function getValue($row, $column, $value)
    {
        $value += $this->grid[$row][$column];
        if (isset($this->grid[$row + 1][$column])) {
            //可以向下走
            $this->getValue($row + 1, $column, $value);
        }
        if (isset($this->grid[$row][$column + 1])) {
            $this->getValue($row, $column + 1, $value);
        }
        if (!isset($this->grid[$row][$column + 1]) && !isset($this->grid[$row + 1][$column])) {
            $this->max_value = max($this->max_value, $value);
        }
        return;
    }
}
