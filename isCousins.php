<?php

/**
 * 993. 二叉树的堂兄弟节点
 * Class IsCousinsSolution
 * https://leetcode-cn.com/problems/cousins-in-binary-tree/
 */
class IsCousinsSolution
{

    /**
     * @param TreeNode $root
     * @param Integer $x
     * @param Integer $y
     * @return Boolean
     */
    function isCousins($root, $x, $y)
    {
        $ary = [$root];
        while (!empty($ary)) {
            $floor = [];
            $tmp = [];
            foreach ($ary as $i => $item) {
                if ($item->left) {
                    $floor[] = $item->left;
                    $tmp[$item->left] = $i;
                }
                if ($item->right) {
                    $floor[] = $item->right;
                    $tmp[$item->right] = $i;
                }
            }
            if (isset($tmp[$x]) || isset($tmp[$y])) {
                return isset($tmp[$x]) && isset($tmp[$y]) ? ($tmp[$x] != $tmp[$y]) : false;
            }
            $ary = $floor;
        }
        return false;
    }
}