<?php

/**
 * 47. 全排列 II
 * Class PermuteUniqueSolution
 * https://leetcode-cn.com/problems/permutations-ii/
 */
class PermuteUniqueSolution
{

    private $res = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums)
    {
        if (empty($nums)) return [];
        $this->DFS("", $nums);
        foreach ($this->res as &$r) {
            $r = explode("|", $r);
        }
        return $this->res;
    }

    function DFS($str, $other_ary)
    {
        if (count($other_ary) == 1) {
            $str .= $other_ary[0];
            !in_array($str, $this->res) && $this->res[] = $str;
        } else {
            foreach ($other_ary as $i => $num) {
                $each_ary = $other_ary;
                array_splice($each_ary, $i, 1);
                $this->DFS("$str$num|", $each_ary);
            }
        }
    }
}