<?php

require "TreeNode.php";

/**
 * 297. 二叉树的序列化与反序列化
 * Class Codec
 * https://leetcode-cn.com/problems/serialize-and-deserialize-binary-tree/
 */
class Codec
{
    function __construct()
    {

    }

    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root)
    {
        $res = [];
        $ary = [$root];
        while (!empty($ary)) {
            $node = array_shift($ary);
            if ($node) {
                $ary[] = $node->left;
                $ary[] = $node->right;
                $res[] = $node->val;
            } else {
                $res[] = 'null';
            }
        }
        $res = implode(',', $res);
        return "[{$res}]";
    }

    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data)
    {
        $data = substr($data, 1, -1);
        if (!$data) return null;
        $data = explode(',', $data);
        $root = new TreeNode($data[0]);
        $cur_floor = [$root];
        $i = 1;
        while (!empty($cur_floor)) {
            $next_floor = [];
            foreach ($cur_floor as $node) {
                if (isset($data[$i]) && $data[$i] != 'null') {
                    $left = new TreeNode($data[$i]);
                    $next_floor[] = $left;
                    $node->left = $left;
                }
                if (isset($data[$i]) && $data[$i + 1] != 'null') {
                    $right = new TreeNode($data[$i + 1]);
                    $next_floor[] = $right;
                    $node->right = $right;
                }
                $i += 2;
            }
            $cur_floor = $next_floor;
        }
        return $root;
    }
}