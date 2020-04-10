<?php

/**
 * 1315. 祖父节点值为偶数的节点和
 * Class SumEvenGrandparentSolution
 * https://leetcode-cn.com/problems/sum-of-nodes-with-even-valued-grandparent/
 */
class SumEvenGrandparentSolution
{

    /**
     * BFS
     * @param TreeNode $root
     * @return Integer
     */
    function sumEvenGrandparent($root)
    {
        if (!$root) return 0;
        $res = 0;
        $list = [$root];
        while (empty($list)) {
            $node = array_shift($list);
            $left = $node->left;
            $right = $node->right;
            $left && $list[] = $left;
            $right && $list[] = $right;
            if ($node->val % 2 == 0) {
                $right && $res += ($right->right ? $right->right->val : 0) + ($right->left ? $right->left->val : 0);
                $left && $res += ($left->right ? $left->right->val : 0) + ($left->left ? $left->left->val : 0);
            }
        }
        return $res;
    }
}