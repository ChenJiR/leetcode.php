<?php

/**
 * 104. 二叉树的最大深度
 * https://leetcode-cn.com/problems/maximum-depth-of-binary-tree/
 * 559. N叉树的最大深度
 * https://leetcode-cn.com/problems/maximum-depth-of-n-ary-tree/
 * 1549. 面试题55 - I. 二叉树的深度
 * https://leetcode-cn.com/problems/er-cha-shu-de-shen-du-lcof/
 *
 * Class MaxDepthSolution
 *
 */
class MaxDepthSolution
{

    /**
     * @param NTreeNode $root
     * @return integer
     */
    function maxDepth_559($root)
    {
        if ($root == null) {
            return 0;
        } else {
            $floor = 0;
            foreach ($root->children as $child) {
                $floor = max($floor, $this->maxDepth_559($child));
            }
            return $floor + 1;
        }
    }

    /**
     * 1549
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth_1549($root)
    {
        return $root == null ? 0 : max($this->maxDepth_1549($root->right), $this->maxDepth_1549($root->left)) + 1;
    }
}