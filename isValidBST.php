<?php

/**
 * 98. 验证二叉搜索树
 * Class IsValidBSTSolution
 * https://leetcode-cn.com/problems/validate-binary-search-tree/
 */
class IsValidBSTSolution
{

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root)
    {
        return $this->helper($root, PHP_INT_MIN, PHP_INT_MAX);
    }

    /**
     * @param TreeNode $node
     * @param int $l
     * @param int $r
     * @return Boolean
     */
    function helper($node, int $l, int $r)
    {
        if ($node == null) {
            return true;
        }
        if ($node->val > $l && $node->val < $r) {
            return $this->helper($node->left, $l, $node->val) && $this->helper($node->right, $node->val, $r);
        }
        return false;
    }
}