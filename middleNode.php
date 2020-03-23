<?php

/**
 * 876. 链表的中间结点
 * Class MiddleNodeSolution
 * https://leetcode-cn.com/problems/middle-of-the-linked-list/
 */
class MiddleNodeSolution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function middleNode($head)
    {
        $a = $b = $head;
        $i = 0;
        while ($a) {
            $i++;
            $a = $a->next;
            if ($i % 2 == 0) {
                $b = $b->next;
            }
        }
        return $b;
    }

    /**
     * 更简单解法 = =
     * @param $head
     * @return mixed
     */
    function middleNode2($head)
    {
        $a = $b = $head;
        while ($a && $a->next != null) {
            $a = $a->next->next;
            $b = $b->next;
        }
        return $b;
    }
}