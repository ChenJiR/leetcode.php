<?php

/**
 * 198. 打家劫舍
 * https://leetcode-cn.com/problems/house-robber/
 *
 * 337. 打家劫舍 III
 * https://leetcode-cn.com/problems/house-robber-iii/
 *
 * Class RobSolution
 */
class RobSolution
{

    /**
     * 198. 打家劫舍
     * @param Integer[] $nums
     * @return Integer
     */
    function rob_1($nums)
    {
        if (empty($nums)) return 0;
        if (count($nums) < 2) return max($nums);
        $dp = [$nums[0], max($nums[0], $nums[1])];
        for ($i = 2; $i < count($nums); $i++) {
            $dp[$i] = max($dp[$i - 2] + $nums[$i], $dp[$i - 1]);
        }
        return $dp[count($nums) - 1];
    }

    /**
     * 337. 打家劫舍 III
     * @param TreeNode $root
     * @return Integer
     */
    function rob_337($root)
    {
        return max($this->dfs($root));
    }

    private function dfs(TreeNode $node)
    {
        if (!$node) return [0, 0];
        $l = $this->dfs($node->left);
        $r = $this->dfs($node->right);
        $selected = $node->val + $l[1] + $r[1];
        $not_selected = max($l[0], $l[1]) + max($r[0], $r[1]);
        return [$selected, $not_selected];
    }
}