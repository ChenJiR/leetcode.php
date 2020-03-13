<?php

/**
 * 1524. 面试题32 - II. 从上到下打印二叉树 II
 * Class LevelOrderSolution
 * https://leetcode-cn.com/problems/cong-shang-dao-xia-da-yin-er-cha-shu-ii-lcof/
 */
class LevelOrderSolution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        if($root == null){
            return [];
        }
        $result = [];
        $this->generateLevel($root,0,$result);
        return $result;
    }

    private function generateLevel(TreeNode $root,$rootLevel,&$result){
        if($root != null){
            isset($result[$rootLevel]) ? $result[$rootLevel][] = $root->val : $result[$rootLevel] = [$root->val];
            if($root->left != null){
                $this->generateLevel($root->left,$rootLevel+1,$result);
            }
            if($root->right != null){
                $this->generateLevel($root->right,$rootLevel+1,$result);
            }
        }
    }
}