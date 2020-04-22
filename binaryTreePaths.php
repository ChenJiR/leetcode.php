<?php

/**
 * 257. 二叉树的所有路径
 * Class BinaryTreePathsSolution
 * https://leetcode-cn.com/problems/binary-tree-paths/
 */
class BinaryTreePathsSolution
{
    private $res = [];

    /**
     * @param TreeNode $root
     * @return String[]
     */
    function binaryTreePaths($root)
    {
        $this->helper("", $root);
        return $this->res;
    }

    /**
     * @param $string
     * @param TreeNode $root
     * @return void
     */
    function helper($string, $root)
    {
        if (!$root) return;
        $string = $string ? "$string->$root->val" : "$root->val";
        if (!$root->right && !$root->left) {
            $this->res[] = $string;
            return;
        }
        $root->right && $this->helper($string, $root->right);
        $root->left && $this->helper($string, $root->left);
    }
}