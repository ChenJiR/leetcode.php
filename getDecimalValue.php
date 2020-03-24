<?php

/**
 * 1290. 二进制链表转整数
 * Class GetDecimalValueSolution
 * https://leetcode-cn.com/problems/convert-binary-number-in-a-linked-list-to-integer/
 */
class GetDecimalValueSolution
{

    /**
     * @param ListNode $head
     * @return Integer
     */
    function getDecimalValue($head)
    {
        $res = 0;
        while ($head) {
            $res = $res * 2 + $head->val ;
            $head = $head->next;
        }
        return $res;
    }
}