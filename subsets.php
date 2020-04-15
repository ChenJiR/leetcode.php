<?php

/**
 * 78. 子集
 * 1460. 面试题 08.04. 幂集
 * Class SubsetsSolution
 * https://leetcode-cn.com/problems/subsets/
 * https://leetcode-cn.com/problems/power-set-lcci/
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


    /**
     * 与方法一 思路一致 写法不同
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets2($nums)
    {
        $res = [[]];
        foreach ($nums as $n) {
            foreach ($res as $item) {
                $res[] = array_merge($item, [$n]);
            }
        }
        return $res;
    }

}