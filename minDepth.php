<?php

/**
 * 111. 二叉树的最小深度
 * Class MinDepthSolution
 * https://leetcode-cn.com/problems/minimum-depth-of-binary-tree/
 */
class MinDepthSolution
{

    /**
     * BFS
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth_1($root)
    {
        if (!$root) return 0;
        $next_floor = [$root];
        $floor_num = 1;
        while (!empty($next_floor)) {
            $floor = $next_floor;
            $next_floor = [];
            foreach ($floor as $node) {
                if (!$node->right && !$node->left) {
                    break 2;
                }
                $node->left && $next_floor[] = $node->left;
                $node->right && $next_floor[] = $node->right;
            }
            $floor_num++;
        }
        return $floor_num;
    }

    private $min_floor = PHP_INT_MAX;

    /**
     * DFS
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth_2($root)
    {
        if (!$root) return 0;
        $this->helper(1, $root);
        return $this->min_floor;
    }

    function helper($floor, $root)
    {
        if (!$root->left && !$root->right) {
            $this->min_floor = min($this->min_floor, $floor);
            return;
        }
        $root->left && $this->helper($floor + 1, $root->left);
        $root->right && $this->helper($floor + 1, $root->right);
    }
}