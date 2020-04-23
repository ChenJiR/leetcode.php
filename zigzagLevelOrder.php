<?php

/**
 * 103. 二叉树的锯齿形层次遍历
 * Class ZigzagLevelOrderSolution
 * https://leetcode-cn.com/problems/binary-tree-zigzag-level-order-traversal/
 */
class ZigzagLevelOrderSolution
{

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder($root)
    {
        if (!$root) return [];
        $res = [[$root->val]];
        $next_floor = [$root];
        $floor_num = 1;
        while (!empty($next_floor)) {
            $floor = $next_floor;
            $next_floor = [];
            $next_floor_list = [];
            $type = $floor_num % 2 == 1;
            while (!empty($floor)) {
                $node = array_pop($floor);
                if ($type) {
                    if ($node->right) {
                        $next_floor[] = $node->right;
                        $next_floor_list[] = $node->right->val;
                    }
                    if ($node->left) {
                        $next_floor[] = $node->left;
                        $next_floor_list[] = $node->left->val;
                    }
                } else {
                    if ($node->left) {
                        $next_floor[] = $node->left;
                        $next_floor_list[] = $node->left->val;
                    }
                    if ($node->right) {
                        $next_floor[] = $node->right;
                        $next_floor_list[] = $node->right->val;
                    }
                }
            }
            $floor_num++;
            !empty($next_floor_list) && $res[] = $next_floor_list;
        }
        return $res;
    }
}