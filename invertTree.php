<?php

/**
 * 226. 翻转二叉树
 * Class Solution
 * https://leetcode-cn.com/problems/invert-binary-tree/
 */
class InvertTreeSolution {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root) {
        if($root == null){
            return null;
        }
        $right = $this->invertTree($root->right);
        $left = $this->invertTree($root->left);
        $root->left = $right;
        $root->right = $left;
        return $root;
    }
}