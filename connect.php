<?php

class Node
{
    public $val;
    public $left;
    public $right;
    public $next;

    function __construct($val = 0)
    {
        $this->val = $val;
        $this->left = null;
        $this->right = null;
        $this->next = null;
    }
}

/**
 * 117. 填充每个节点的下一个右侧节点指针 II
 * Class ConnectSolution
 * https://leetcode-cn.com/problems/populating-next-right-pointers-in-each-node-ii/
 */
class ConnectSolution
{
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root)
    {
        $tmp = [$root];
        while (!empty($tmp)) {
            $next_floor = [];
            foreach ($tmp as $k => $node) {
                $node->next = $tmp[$k + 1] ?? null;
                $node->left && $next_floor[] = $node->left;
                $node->right && $next_floor[] = $node->right;
            }
            $tmp = $next_floor;
        }
        return $root;
    }
}