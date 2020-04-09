<?php

require_once "TreeNode.php";

/**
 * 654. 最大二叉树
 * Class ConstructMaximumBinaryTreeSolution
 * https://leetcode-cn.com/problems/maximum-binary-tree/
 */
class ConstructMaximumBinaryTreeSolution
{

    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function constructMaximumBinaryTree($nums)
    {
        $prev_node = new TreeNode($nums[0]);
        $root = $prev_node;
        for ($i = 1; $i < count($nums); $i++) {
            $cur_node = new TreeNode($nums[$i]);
            if ($cur_node->val < $prev_node->val) {
                $prev_node->right = $cur_node;
            } else {
                if ($cur_node->val > $root->val) {
                    $cur_node->left = $root;
                    $root = $cur_node;
                } else {
                    $tmp_node = $root;
                    while ($cur_node->val < $tmp_node->right->val) {
                        $tmp_node = $tmp_node->right;
                    }
                    $cur_node->left = $tmp_node->right;
                    $tmp_node->right = $cur_node;
                }
            }
            $prev_node = $cur_node;
        }
        return $root;
    }
}