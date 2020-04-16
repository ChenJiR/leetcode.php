<?php

/**
 * 102. 二叉树的层次遍历
 * https://leetcode-cn.com/problems/binary-tree-level-order-traversal/
 * 429. N叉树的层序遍历
 * https://leetcode-cn.com/problems/n-ary-tree-level-order-traversal/
 * 1536. 面试题32 - I. 从上到下打印二叉树
 * https://leetcode-cn.com/problems/cong-shang-dao-xia-da-yin-er-cha-shu-lcof/
 * 1537. 面试题32 - II. 从上到下打印二叉树 II
 * https://leetcode-cn.com/problems/cong-shang-dao-xia-da-yin-er-cha-shu-ii-lcof/
 *
 * Class LevelOrderSolution
 */
class LevelOrderSolution
{

    /**
     * 429. N叉树的层序遍历
     * BFS
     * @param NTreeNode $root
     * @return Integer[][]
     */
    function levelOrder_429($root)
    {
        if (!$root) return [];
        $ary = [$root];
        $res = [];
        while (!empty($ary)) {
            $floor_val = [];
            $floor = [];
            foreach ($ary as $item) {
                $floor_val[] = $item->val;
                foreach ($item->children as $node) {
                    $floor[] = $node;
                }
            }
            $res[] = $floor_val;
            $ary = $floor;
        }
        return $res;
    }

    /**
     * 1536. 面试题32 - I. 从上到下打印二叉树
     * BFS
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder_1536($root)
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
     * 102 1537. 面试题32 - II. 从上到下打印二叉树 II
     * DFS
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder_102_1537($root)
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