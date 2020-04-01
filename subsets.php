<?php

/**
 * 78. 子集
 * Class SubsetsSolution
 * https://leetcode-cn.com/problems/subsets/
 */
class SubsetsSolution
{

    /**
     * 递归
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums)
    {
        if (count($nums) == 1) {
            return [[], $nums];
        }
        $n = array_pop($nums);
        $res = $this->subsets($nums);
        foreach ($res as $r) {
            $res[] = array_merge($r, [$n]);
        }
        return $res;
    }
}