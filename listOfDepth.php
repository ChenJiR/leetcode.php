<?php
require_once "TreeNode.php";
require_once "ListNode.php";

/**
 * 1423. 面试题 04.03. 特定深度节点链表
 * Class Solution
 * https://leetcode-cn.com/problems/list-of-depth-lcci/
 */
class ListOfDepthSolution
{

    /**
     * @param TreeNode $tree
     * @return ListNode[]
     */
    function listOfDepth($tree)
    {
        if (!$tree) {
            return [];
        }
        $each_floor = new ListNode(null);
        $floor = $each_floor;
        $res = [new ListNode($tree->val)];
        $list = [$tree];
        $next_list = [];
        while (!empty($list)) {
            $tree = array_shift($list);
            if ($tree->left) {
                $each_floor->next = new ListNode($tree->left->val);
                $each_floor = $each_floor->next;
                $next_list[] = $tree->left;
            }
            if ($tree->right) {
                $each_floor->next = new ListNode($tree->right->val);
                $each_floor = $each_floor->next;
                $next_list[] = $tree->right;
            }
            if (empty($list)) {
                $floor->next && $res[] = $floor->next;
                $each_floor = new ListNode(null);
                $floor = $each_floor;
                $list = $next_list;
                $next_list = [];
            }
        }
        $floor->next && $res[] = $floor->next;
        return $res;
    }
}