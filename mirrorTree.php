<?php

/**
 * 1518. 面试题27. 二叉树的镜像
 * Class MirrorTreeSolution
 * https://leetcode-cn.com/problems/er-cha-shu-de-jing-xiang-lcof/
 */
class MirrorTreeSolution {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function mirrorTree($root) {
        if($root == null){
            return null;
        }
        $right = $this->mirrorTree($root->right);
        $left = $this->mirrorTree($root->left);
        $root->left = $right;
        $root->right = $left;
        return $root;
    }
}