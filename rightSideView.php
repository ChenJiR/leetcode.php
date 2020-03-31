<?php

/**
 * 199. 二叉树的右视图
 * Class RightSideViewSolution
 * https://leetcode-cn.com/problems/binary-tree-right-side-view/
 */
class RightSideViewSolution
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function rightSideView($root)
    {
        $res = [];
        $floor = [$root];
        $next_floor = [];
        while (!empty($floor)) {
            foreach ($floor as $node) {
                $node->left && $next_floor[] = $node->left;
                $node->right && $next_floor[] = $node->right;
            }
            $res[] = array_pop($floor)->val;
            $floor = $next_floor;
            $next_floor = [];
        }
        return $res;
    }
}