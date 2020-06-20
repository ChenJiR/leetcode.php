<?php

/**
 * 124. 二叉树中的最大路径和
 * Class MaxPathSumSolution
 * https://leetcode-cn.com/problems/binary-tree-maximum-path-sum/
 */
class MaxPathSumSolution
{

    private $max = PHP_INT_MIN;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxPathSum($root)
    {
        $this->helper($root);
        return $this->max;
    }

    function helper($root)
    {
        if ($root === null) {
            return 0;
        }
        $left = max($this->helper($root->left), 0);
        $right = max($this->helper($root->right), 0);
        $lmr = $root->val + $left + $right;
        $ret = $root->val + max($left, $right);
        $this->max = max($this->max, $lmr, $ret);
        return $ret;
    }
}