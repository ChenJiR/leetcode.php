<?php

/**
 * 16. 最接近的三数之和
 * Class ThreeSumClosestSolution
 * https://leetcode-cn.com/problems/3sum-closest/
 */
class ThreeSumClosestSolution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target)
    {
        $res = PHP_INT_MAX;
        sort($nums);
        for ($i = 0; $i < count($nums); $i++) {
            if (isset($nums[$i - 1]) && $nums[$i] == $nums[$i - 1]) {
                continue;
            }

            $left = $i + 1;
            $right = count($nums) - 1;
            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                if ($sum == $target) {
                    return $sum;
                } else {
                    if (abs($sum - $target) < abs($res - $target)) {
                        $res = $sum;
                    }
                    $sum < $target ? $left++ : $right--;
                }
            }
        }
        return $res;
    }

}