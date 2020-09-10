<?php

/**
 * 216. 组合总和 III
 * Class CombinationSum3Solution
 * https://leetcode-cn.com/problems/combination-sum-iii/
 */
class CombinationSum3Solution
{

    protected $result = [];

    protected $k;

    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer[][]
     */
    function combinationSum3($k, $n)
    {
        if ($n <= 0) return [];
        $ary = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $this->k = $k;
        $this->helper($ary, $n, [], 0);
        return $this->result;
    }

    private function helper($nums, $target, $path, $start)
    {
        if ($target < 0) return;
        if ($target == 0) {
            count($path) == $this->k && $this->result[] = $path;
            return;
        }
        if (count($path) == $this->k) return;

        for ($i = $start; $i < count($nums); ++$i) {
            // 第一次剪枝，因为数组排好序了，小的数字都得不到结果，大的数字就没有必要计算了
            if ($target - $nums[$i] < 0) break;
            // 第二次剪枝，如示例 [1,1,2,5,6]，遍历到第二个分支时，[1,2], [1,5], [1,6], [1,2,5], [1,2,6], [1,5,6]
            // 这样的子树下的所有情况在第一次遍历时都已覆盖，无需再重复计算
            if ($i > $start) {
                if ($nums[$i] == $nums[$i - 1]) continue;
            }
            $path[] = $nums[$i];
            $this->helper($nums, $target - $nums[$i], $path, $i + 1);
            array_pop($path);
        }
    }
}
