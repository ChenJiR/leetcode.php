<?php

/**
 * 107. 二叉树的层次遍历 II
 * Class LevelOrderBottomSolution
 * https://leetcode-cn.com/problems/binary-tree-level-order-traversal-ii/
 */
class LevelOrderBottomSolution
{

    /**
     * BFS
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrderBottom($root)
    {
        $res = [];
        $arr = [$root];
        $next_floor = [];
        while (!empty($arr)) {
            $each_floor_val = [];
            foreach ($arr as $node) {
                $node->val !== null && $each_floor_val[] = $node->val;
                $node->left && $next_floor[] = $node->left;
                $node->right && $next_floor[] = $node->right;
            }
            $arr = $next_floor;
            $next_floor = [];
            !empty($each_floor_val) && $res[] = $each_floor_val;
        }
        return array_reverse($res);
    }
}