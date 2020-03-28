<?php

/**
 * 101. 对称二叉树
 * 1533. 面试题28. 对称的二叉树
 * Class IsSymmetricSolution
 * https://leetcode-cn.com/problems/symmetric-tree/
 * https://leetcode-cn.com/problems/dui-cheng-de-er-cha-shu-lcof/
 */
class IsSymmetricSolution
{

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root)
    {
        $left = [$root->left];
        $right = [$root->right];
        while (!empty($left) || !empty($right)) {
            $left_tree = array_shift($left);
            $right_tree = array_shift($right);
            if ($left_tree == null && $right_tree == null) {
                continue;
            } else if ($left_tree == null || $right_tree == null) {
                return false;
            }
            if ($left_tree->val != $right_tree->val) {
                return false;
            }
            $left[] = $left_tree->left;
            $left[] = $left_tree->right;
            $right[] = $right_tree->right;
            $right[] = $right_tree->left;
        }
        return true;
    }
}