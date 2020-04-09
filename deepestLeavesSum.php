<?php

/**
 * 1302. 层数最深叶子节点的和
 * Class DeepestLeavesSumSolution
 * https://leetcode-cn.com/problems/deepest-leaves-sum/
 */
class DeepestLeavesSumSolution
{

    /**
     * BFS
     * @param TreeNode $root
     * @return Integer
     */
    function deepestLeavesSum($root)
    {
        $ary = [$root];
        while (true) {
            $floor_sum = 0;
            $floor = [];
            foreach ($ary as $node) {
                $floor_sum += $node->val;
                isset($node->left) && $floor[] = $node->left;
                isset($node->right) && $floor[] = $node->right;
            }
            if (empty($floor)) {
                return $floor_sum;
            }
            $ary = $floor;
        }
    }
}