<?php

/**
 * 637. 二叉树的层平均值
 * Class AverageOfLevelsSolution
 * https://leetcode-cn.com/problems/average-of-levels-in-binary-tree/
 */
class AverageOfLevelsSolution
{

    /**
     * @param TreeNode $root
     * @return Float[]
     */
    function averageOfLevels($root)
    {
        if (!$root) return [];
        $res = [$root->val];
        $tmp = [$root];
        while (!empty($tmp)) {
            $floor = [];
            $floor_value = [];
            foreach ($tmp as $node) {
                if ($node->right) {
                    $floor[] = $node->right;
                    $floor_value[] = $node->right->val;
                }
                if ($node->left) {
                    $floor[] = $node->left;
                    $floor_value[] = $node->left->val;
                }
            }
            $tmp = $floor;
            !empty($floor_value) && $res[] = array_sum($floor_value) / count($floor_value);
        }
        return $res;
    }
}