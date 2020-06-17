<?php

require "TreeNode.php";

/**
 * 1028. 从先序遍历还原二叉树
 * Class RecoverFromPreorderSolution
 * https://leetcode-cn.com/problems/recover-a-tree-from-preorder-traversal/
 */
class RecoverFromPreorderSolution
{

    /**
     * @param String $S
     * @return TreeNode
     */
    function recoverFromPreorder($S)
    {
        $node_stack = [];
        $i = $deps = 0;
        while ($i < strlen($S)) {
            if ($S[$i] == '-') {
                $deps = 0;
                for ($j = $i; $S[$j] == '-'; $j++) {
                    $deps++;
                }
            } else {
                $num = '';
                for ($j = $i; isset($S[$j]) && $S[$j] != '-'; $j++) {
                    $num .= $S[$j];
                }
                $node = new TreeNode($num);
                if ($deps > count($node_stack) - 1) {
                    if (!empty($node_stack)) end($node_stack)->left = $node;
                } else {
                    while ($deps <= count($node_stack) - 1) {
                        array_pop($node_stack);
                    }
                    end($node_stack)->right = $node;
                }
                $node_stack[] = $node;
            }
            $i = $j;
        }
        return $node_stack[0];
    }
}