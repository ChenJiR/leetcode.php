<?php

/**
 * 1536. 面试题32 - I. 从上到下打印二叉树
 * 1537. 面试题32 - II. 从上到下打印二叉树 II
 * Class LevelOrderSolution
 * https://leetcode-cn.com/problems/cong-shang-dao-xia-da-yin-er-cha-shu-lcof/
 * https://leetcode-cn.com/problems/cong-shang-dao-xia-da-yin-er-cha-shu-ii-lcof/
 */
class LevelOrderSolution
{

    /**
     * 1536. 面试题32 - I. 从上到下打印二叉树
     * BFS
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        $res = [];
        $list = [$root];
        while (!empty($list)) {
            $tree = array_shift($list);
            if ($tree) {
                $res[] = $tree->val;
                $tree->left && $list[] = $tree->left;
                $tree->right && $list[] = $tree->right;
            }
        }
        return $res;
    }

    /**
     * 1537. 面试题32 - II. 从上到下打印二叉树 II
     * DFS
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder2($root)
    {
        if ($root == null) {
            return [];
        }
        $result = [];
        $this->generateLevel($root, 0, $result);
        return $result;
    }

    private function generateLevel(TreeNode $root, $rootLevel, &$result)
    {
        if ($root != null) {
            isset($result[$rootLevel]) ? $result[$rootLevel][] = $root->val : $result[$rootLevel] = [$root->val];
            if ($root->left != null) {
                $this->generateLevel($root->left, $rootLevel + 1, $result);
            }
            if ($root->right != null) {
                $this->generateLevel($root->right, $rootLevel + 1, $result);
            }
        }
    }
}