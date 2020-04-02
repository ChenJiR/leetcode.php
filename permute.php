<?php

/**
 * 46. 全排列
 * Class PermuteSolution
 * https://leetcode-cn.com/problems/permutations/
 */
class PermuteSolution
{

    private $res = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums)
    {
        if(empty($nums)) return [];
        $this->DFS([], $nums);
        return $this->res;
    }

    function DFS($num_ary, $other_ary)
    {
        if (count($other_ary) == 1) {
            $this->res[] = array_merge($num_ary, $other_ary);
        } else {
            foreach ($other_ary as $i => $num) {
                $each_ary = $other_ary;
                array_splice($each_ary, $i, 1);
                $this->DFS(array_merge($num_ary, [$num]), $each_ary);
            }
        }
    }
}