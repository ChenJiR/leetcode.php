<?php

/**
 * 945. 使数组唯一的最小增量
 * Class MinIncrementForUniqueSolution
 * https://leetcode-cn.com/problems/minimum-increment-to-make-array-unique/
 */
class MinIncrementForUniqueSolution
{

    /**
     * 复杂情况下会超时
     * @param Integer[] $A
     * @return Integer
     */
    function minIncrementForUnique($A)
    {
        $unique = [];
        $i = 0;
        foreach ($A as $a) {
            while (in_array($a, $unique)) {
                $a++;
                $i++;
            }
            $unique[] = $a;
        }
        return $i;
    }

    function minIncrementForUnique2($A)
    {
        sort($A);
        $max = PHP_INT_MIN;
        $res = 0;
        foreach ($A as $a) {
            if ($a <= $max) {
                $max += 1;
                $res += $max - $a;
            } else {
                $max = $a;
            }
        }
        return $res;
    }
}

var_dump((new MinIncrementForUniqueSolution())->minIncrementForUnique2([3, 2, 1, 2, 1, 7, 2, 5, 7, 5, 4, 6, 4, 5, 2, 34, 6, 73, 3, 453, 5, 3, 42, 42, 432, 0, 54, 64, 34]));