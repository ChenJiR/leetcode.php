<?php

/**
 * 112. 路径总和
 * Class HasPathSumSolution
 * https://leetcode-cn.com/problems/path-sum/
 */
class HasPathSumSolution
{

    /**
     * DFS
     * @param TreeNode $root
     * @param Integer $sum
     * @return Boolean
     */
    function hasPathSum($root, $sum)
    {
        if (!$root) return false;
        if (!$root->left && !$root->right) return $sum == $root->val;
        return
            ($root->left ? $this->hasPathSum($root->left, $sum - $root->val) : false) ||
            ($root->right ? $this->hasPathSum($root->right, $sum - $root->val) : false);
    }
}