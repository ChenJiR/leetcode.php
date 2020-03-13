<?php

/**
 * 1549. 面试题55 - I. 二叉树的深度
 * Class MaxDepthSolution
 * https://leetcode-cn.com/problems/er-cha-shu-de-shen-du-lcof/
 */
class MaxDepthSolution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        return $root == null ? 0 : max($this->maxDepth($root->right),$this->maxDepth($root->left)) + 1;
    }
}