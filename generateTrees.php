<?php

/**
 * 95. 不同的二叉搜索树 II
 * Class GenerateTreesSolution
 * https://leetcode-cn.com/problems/unique-binary-search-trees-ii/
 */
class GenerateTreesSolution
{

    /**
     * @param Integer $n
     * @return TreeNode[]
     */
    function generateTrees($n)
    {
        if ($n == 0) {
            return [];
        }
        return $this->generate(1, $n);
    }

    function generate($start, $end)
    {
        $tree = [];
        if ($start > $end) {
            $tree[] = null;
            return $tree;
        }
        for ($i = $start; $i <= $end; $i++) {
            $left = $this->generate($start, $i - 1);
            $right = $this->generate($i + 1, $end);
            foreach ($left as $l) {
                foreach ($right as $r) {
                    $each_tree = new TreeNode($i);
                    $each_tree->left = $l;
                    $each_tree->right = $r;
                    $tree[] = $each_tree;
                }
            }
        }
        return $tree;
    }
}