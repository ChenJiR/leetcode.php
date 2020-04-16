<?php

/**
 * 513. 找树左下角的值
 * Class FindBottomLeftValueSolution
 * https://leetcode-cn.com/problems/find-bottom-left-tree-value/
 */
class FindBottomLeftValueSolution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function findBottomLeftValue($root)
    {
        $ary = [$root];
        while (!empty($ary)) {
            $floor = [];
            foreach ($ary as $node) {
                $node->right && $floor[] = $node->right;
                $node->left && $floor[] = $node->left;
            }
            if (empty($floor)) {
                return $ary[0]->val;
            } else {
                $ary = $floor;
            }
        }
    }
}