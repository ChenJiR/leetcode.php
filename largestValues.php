<?php

/**
 * 515. 在每个树行中找最大值
 * Class LargestValuesSolution
 * https://leetcode-cn.com/problems/find-largest-value-in-each-tree-row/
 */
class LargestValuesSolution
{

    /**
     * BFS
     * @param TreeNode $root
     * @return Integer[]
     */
    function largestValues($root)
    {
        if (!$root) return [];
        $next_floor = new SplQueue();
        $next_floor->push($root);
        $res = [$root->val];
        while ($next_floor->count() > 0) {
            $floor = $next_floor;
            $next_floor = new SplQueue();
            $max = PHP_INT_MIN;
            while ($floor->count() > 0) {
                $node = $floor->pop();
                if ($node->left) {
                    $max = max($node->left->val, $max);
                    $next_floor->push($node->left);
                }
                if ($node->right) {
                    $max = max($node->right->val, $max);
                    $next_floor->push($node->right);
                }
            }
            if ($next_floor->count() > 0) {
                $res[] = $max;
            }
        }
        return $res;
    }
}