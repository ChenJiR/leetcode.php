<?php

/**
 * 2. 两数相加
 * https://leetcode-cn.com/problems/add-two-numbers/
 * 445. 两数相加 II
 * https://leetcode-cn.com/problems/add-two-numbers-ii/
 *
 * Class AddTwoNumbersSolution
 */
class AddTwoNumbersSolution
{

    /**
     * 2
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers_2($l1, $l2)
    {
        $overflow = false;
        $result = $prev = new ListNode(0);
        $result->next = $prev;
        while ($l1 !== null || $l2 !== null || $overflow) {
            $sum = ($l1 ? $l1->val : 0) + ($l2 ? $l2->val : 0) + ($overflow ? 1 : 0);
            $l1 = $l1 ? $l1->next : null;
            $l2 = $l2 ? $l2->next : null;
            if ($sum >= 10) {
                $overflow = true;
                $sum = $sum % 10;
            } else {
                $overflow = false;
            }
            $prev->next = new ListNode($sum);
            $prev = $prev->next;
        }
        return $result->next;
    }

    /**
     * 445 反转链表后相加
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers_445_1($l1, $l2)
    {
        /**
         * @param ListNode $listNode
         * @return ListNode|null
         */
        $list_rev = function ($listNode) {
            $prev = null;
            $cur = $listNode;
            while ($cur) {
                $next = $cur->next;
                $cur->next = $prev;
                $prev = $cur;
                $cur = $next;
            }
            return $prev;
        };
        $l1 = $list_rev($l1);
        $l2 = $list_rev($l2);
        $res = null;
        $add = false;
        while ($l1 || $l2 || $add) {
            $sum = $add ? 1 : 0;
            if ($l1) {
                $sum += $l1->val;
                $l1 = $l1->next;
            }
            if ($l2) {
                $sum += $l2->val;
                $l2 = $l2->next;
            }
            if ($sum > 9) {
                $sum -= 10;
                $add = true;
            } else {
                $add = false;
            }
            $node = new ListNode($sum);
            $node->next = $res;
            $res = $node;
        }
        return $res;
    }

    /**
     * 445 栈
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers_445_2($l1, $l2)
    {
        /**
         * @param ListNode $listNode
         * @return array
         */
        $ListToStock = function ($listNode) {
            $stock = [];
            while ($listNode) {
                $stock[] = $listNode->val;
                $listNode = $listNode->next;
            }
            return $stock;
        };
        $stack1 = $ListToStock($l1);
        $stack2 = $ListToStock($l2);
        $res = null;
        $add = false;
        while (!empty($stack1) || !empty($stack2) || $add) {
            $sum = $add ? 1 : 0;
            if (!empty($stack1)) {
                $sum += array_pop($stack1);
            }
            if (!empty($stack2)) {
                $sum += array_pop($stack2);
            }
            if ($sum > 9) {
                $sum -= 10;
                $add = true;
            } else {
                $add = false;
            }
            $node = new ListNode($sum);
            $node->next = $res;
            $res = $node;
        }
        return $res;
    }
}