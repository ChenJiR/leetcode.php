<?php

/**
 * 113. 路径总和 II
 * Class PathSumSolution
 * https://leetcode-cn.com/problems/path-sum-ii/
 */
class PathSumSolution
{

    protected $res = [];

    protected $sum;

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Integer[][]
     */
    function pathSum($root, $sum)
    {
        if (!$root) return [];
        $this->sum = $sum;
        $this->dfs($root, 0, []);
        return $this->res;
    }

    function dfs($node, $sum, $path)
    {
        $sum += $node->val;
        $path[] = $node->val;
        if (!$node->right && !$node->left) {
            $sum == $this->sum && $this->res[] = $path;
            return;
        }
        $node->right && $this->dfs($node->right, $sum, $path);
        $node->left && $this->dfs($node->left, $sum, $path);
    }
}