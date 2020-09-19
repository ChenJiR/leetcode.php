<?php

/**
 * 404. 左叶子之和
 * Class SumOfLeftLeavesSolution
 * https://leetcode-cn.com/problems/sum-of-left-leaves/
 */
class SumOfLeftLeavesSolution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumOfLeftLeaves($root)
    {
        if (!$root) return 0;
        $sum = 0;
        $right = [$root];
        $left = [];
        while (!empty($right) || !empty($left)) {
            $tmp_right = [];
            $tmp_left = [];
            foreach ($right as $node) {
                $node->right && $tmp_right[] = $node->right;
                $node->left && $tmp_left[] = $node->left;
            }
            foreach ($left as $node) {
                if (!$node->right && !$node->left) {
                    $sum += $node->val;
                } else {
                    $node->right && $tmp_right[] = $node->right;
                    $node->left && $tmp_left[] = $node->left;
                }
            }
            $right = $tmp_right;
            $left = $tmp_left;
        }
        return $sum;
    }
}