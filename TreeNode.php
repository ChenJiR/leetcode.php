<?php

/**
 * 二叉树
 * Definition for a binary tree node.
 */
class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($value)
    {
        $this->val = $value;
    }

    static function arrayToTree(array $ary)
    {
        $root = new static(array_shift($ary));
        $floor = [$root];
        while (!empty($ary)) {
            $next_floor = [];
            foreach ($floor as $item) {
                $left = array_shift($ary);
                if ($left) {
                    $item->left = new static($left);
                    $next_floor[] = $item->left;
                }
                $right = array_shift($ary);
                if ($right) {
                    $item->right = new static($right);
                    $next_floor[] = $item->right;
                }
            }
            $floor = $next_floor;
        }
        return $root;
    }
}

/**
 * 多叉树
 * Class NTreeNode
 */
class NTreeNode
{
    public $val = null;
    public $children = null;

    function __construct($val = 0)
    {
        $this->val = $val;
        $this->children = array();
    }
}