<?php

/**
 * 133. 克隆图
 * Class CloneGraphSolution
 * https://leetcode-cn.com/problems/clone-graph/
 */
class CloneGraphSolution
{

    private $node_list;

    /**
     * @param Node $node
     * @return Node
     */
    function cloneGraph($node)
    {
        if ($node === null) return null;

        if (array_key_exists($node->val, $this->node_list)) return $this->node_list[$node->val];

        $cur_node = new Node($node->val);
        $this->node_list[$cur_node->val] = $cur_node;

        foreach ($node->neighbors as $neighbor) {
            $cur_node->neighbors[] = $this->cloneGraph($neighbor);
        }
        return $cur_node;
    }
}

/**
 * Definition for a Node.
 */
class Node
{
    public $val = null;
    public $neighbors = null;

    function __construct($val = 0)
    {
        $this->val = $val;
        $this->neighbors = array();
    }
}
