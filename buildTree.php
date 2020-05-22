<?php

/**
 * 105. 从前序与中序遍历序列构造二叉树
 * Class BuildTreeSolution
 * https://leetcode-cn.com/problems/construct-binary-tree-from-preorder-and-inorder-traversal/
 */
class BuildTreeSolution
{

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder)
    {
        if (empty($preorder)) {
            return null;
        }
        $root = new TreeNode($preorder[0]);
        $stack = [$root];
        for ($i = 1; $i < count($preorder); $i++) {
            $node = end($stack);
            if ($node->val == reset($inorder)) {
                while (!empty($stack) && end($stack)->val == reset($inorder)) {
                    $node = array_pop($stack);
                    array_shift($inorder);
                }
                $node->right = new TreeNode($preorder[$i]);
                $stack[] = $node->right;
            } else {
                $node->left = new TreeNode($preorder[$i]);
                $stack[] = $node->left;
            }
        }
        return $root;
    }
}