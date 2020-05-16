<?php

include "ListNode.php";

/**
 * 25. K 个一组翻转链表
 * Class ReverseKGroupSolution
 * https://leetcode-cn.com/problems/reverse-nodes-in-k-group/
 */
class ReverseKGroupSolution
{

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k)
    {
        if ($head == null) return $head;
        $pre = new ListNode(null);
        $pre->next = $head;
        $hair = $pre;
        $tail = $pre;
        while ($tail->next) {
            $tail = $pre;
            for ($i = 0; $i < $k; $i++) {
                if (!$tail->next) {
                    break 2;
                }
                $tail = $tail->next;
            }
            $next = $tail->next;
            $start = $pre->next;
            $tail->next = null;
            $pre->next = $this->reverse($start);
            $start->next = $next;
            $pre = $start;
        }
        return $hair->next;
    }

    /**
     * @param ListNode $head
     * @return ListNode
     */
    public function reverse($head)
    {
        $pre = new ListNode(null);
        $cur = $head;
        while ($cur) {
            $next = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $next;
        }
        return $pre;
    }
}

$list = ListNode::arrayToList([1, 2, 3, 4, 5]);
ListNode::printList((new ReverseKGroupSolution())->reverseKGroup($list, 2));