<?php

/**
 * 141. 环形链表
 * Class HasCycleSolution
 * https://leetcode-cn.com/problems/linked-list-cycle/solution/
 */
class HasCycleSolution
{
    /**
     * 1 hash表储存节点
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle_1($head)
    {
        $tmp = [];
        for ($cur = $head; $cur; $cur = $cur->next) {
            if (in_array($cur, $tmp)) {
                return true;
            }
            $tmp[] = $cur;
        }
        return false;
    }

    /**
     * 双指针
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle_2($head)
    {
        $slow = $head;
        $fast = $head->next;
        while ($fast && $fast->next) {
            if ($slow == $fast) {
                return true;
            }
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return false;
    }
}