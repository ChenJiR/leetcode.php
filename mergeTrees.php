<?php

/**
 * 617. 合并二叉树
 * Class MergeTreesSolution
 * https://leetcode-cn.com/problems/merge-two-binary-trees/
 */
class MergeTreesSolution
{

    /**
     * DFS 递归
     * @param TreeNode $t1
     * @param TreeNode $t2
     * @return TreeNode
     */
    function mergeTrees($t1, $t2)
    {
        if (!$t1 && !$t2) {
            return null;
        }
        $newt = new TreeNode(($t1 ? $t1->val : 0) + ($t2 ? $t2->val : 0));
        $newt->left = $this->mergeTrees($t1->left, $t2->left);
        $newt->right = $this->mergeTrees($t1->right, $t2->right);
        return $newt;
    }

    /**
     * BFS 迭代
     * @param TreeNode $t1
     * @param TreeNode $t2
     * @return TreeNode
     */
    function mergeTrees2($t1, $t2)
    {
        if (!$t1) return $t2;
        $node_list = [[$t1, $t2]];
        while (!empty($node_list)) {
            list($t_1, $t_2) = array_shift($node_list);
            if (!$t_1 && !$t_2) {
                continue;
            }
            $t_1->val += $t_2->val;
            if ($t_1->left) {
                $node_list[] = [$t_1->left, $t_2->left];
            } else {
                $t_1->left = $t_2->left;
            }
            if ($t_1->right) {
                $node_list[] = [$t_1->right, $t_2->right];
            } else {
                $t_1->right = $t_2->right;
            }
        }
        return $t1;
    }
}