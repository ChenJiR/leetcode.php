<?php

require "TreeNode.php";

/**
 * 1616. 面试题 04.02. 最小高度树
 * https://leetcode-cn.com/problems/minimum-height-tree-lcci/comments/
 * 108. 将有序数组转换为二叉搜索树
 * https://leetcode-cn.com/problems/convert-sorted-array-to-binary-search-tree/
 *
 * Class SortedArrayToBSTSolution
 */
class SortedArrayToBSTSolution
{

    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums)
    {
        $count = count($nums);
        if ($count == 1) return new TreeNode($nums[0]);
        if ($count == 0) return null;
        $n = intval($count / 2);
        $root = new TreeNode($nums[$n]);
        $root->left = $this->sortedArrayToBST(array_slice($nums, 0, $n));
        $root->right = $this->sortedArrayToBST(array_slice($nums, $n + 1));
        return $root;
    }
}