<?php

/**
 * 543. 二叉树的直径
 * Class DiameterOfBinaryTreeSolution
 * https://leetcode-cn.com/problems/diameter-of-binary-tree/
 */
class DiameterOfBinaryTreeSolution {

    private $max = 0;

    /**
     * 注意：直径并不一定通过根节点！
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root) {
        $this->getTreeDepth($root);
        return $this->max;
    }

    function getTreeDepth($root){
        $right_depth = $root->right ? $this->getTreeDepth($root->right)+1 : 0;
        $left_depth = $root->left ? $this->getTreeDepth($root->left)+1 : 0;
        $this->max = max($this->max,$right_depth + $left_depth);
        return max($right_depth,$left_depth);
    }
}