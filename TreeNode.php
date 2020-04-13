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