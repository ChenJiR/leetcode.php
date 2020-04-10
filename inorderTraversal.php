<?php

/**
 * 94. 二叉树的中序遍历
 * Class InorderTraversalSolution
 * https://leetcode-cn.com/problems/binary-tree-inorder-traversal/solution/
 */
class InorderTraversalSolution
{

    /**
     * 递归
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root)
    {
        return array_merge(
            $root->left ? $this->inorderTraversal($root->left) : [],
            [$root->val],
            $root->right ? $this->inorderTraversal($root->right) : []
        );
    }

    /**
     * 栈
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal2($root)
    {
        $res = [];
        $stack = [];
        $cur = $root;
        while ($cur || !empty($stack)) {
            while ($cur) {
                $stack[] = $cur;
                $cur = $cur->left;
            }
            $cur = array_pop($stack);
            $res[] = $cur->val;
            $cur = $cur->right;
        }
        return $res;
    }

}