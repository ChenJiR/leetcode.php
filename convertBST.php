<?php

/**
 * 538. 把二叉搜索树转换为累加树
 * https://leetcode-cn.com/problems/convert-bst-to-greater-tree/
 * 1038. 从二叉搜索树到更大和树
 * https://leetcode-cn.com/problems/binary-search-tree-to-greater-sum-tree/
 *
 * Class ConvertBSTSolution
 */
class ConvertBSTSolution
{

    protected $sum = 0;

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function convertBST($root)
    {
        if (!$root) return null;

        $this->convertBST($root->right);
        $root->val = $root->val + $this->sum;
        $this->sum = $root->val;
        $this->convertBST($root->left);
        return $root;
    }

}