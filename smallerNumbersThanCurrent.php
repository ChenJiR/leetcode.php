<?php

/**
 * 1365. 有多少小于当前数字的数字
 * Class SmallerNumbersThanCurrentSolution
 * https://leetcode-cn.com/problems/how-many-numbers-are-smaller-than-the-current-number/
 */
class SmallerNumbersThanCurrentSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function smallerNumbersThanCurrent($nums)
    {
        $result = [];
        foreach ($nums as $n) {
            $count = 0;
            foreach ($nums as $i) {
                if ($n > $i) {
                    $count++;
                }
            }
            $result[] = $count;
        }
        return $result;
    }
}