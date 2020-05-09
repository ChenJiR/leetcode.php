<?php

/**
 * 236. 二叉树的最近公共祖先
 * Class LowestCommonAncestorSolution
 * https://leetcode-cn.com/problems/lowest-common-ancestor-of-a-binary-tree/comments/
 */
class LowestCommonAncestorSolution
{
    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q)
    {
        if($root == null || $root->val == $p->val || $root->val == $q->val) return $root;
        $left = $this->lowestCommonAncestor($root->left,$p,$q);
        $right = $this->lowestCommonAncestor($root->right,$p,$q);
        if($left && $right){
            return $root;
        }else{
            return !$right && !$left ? null : ($left ?: $right);
        }
    }
}