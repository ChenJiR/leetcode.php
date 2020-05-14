<?php

/**
 * 114. 二叉树展开为链表
 * Class FlattenSolution
 * https://leetcode-cn.com/problems/flatten-binary-tree-to-linked-list/
 */
class FlattenSolution
{

    /**
     * @param TreeNode $root
     * @return NULL
     */
    function flatten(&$root)
    {
        if ($root == null) {
            return;
        }
        $this->flatten($root->left);
        $this->flatten($root->right);
        $right = $root->right;
        $root->right = $root->left;
        $root->left = null;
        while ($root->right) $root = $root->right;
        $root->right = $right;
    }
}