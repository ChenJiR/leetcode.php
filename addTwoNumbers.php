<?php

/**
 * 2. 两数相加
 * Class AddTwoNumbersSolution
 * https://leetcode-cn.com/problems/add-two-numbers/
 */
class AddTwoNumbersSolution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $overflow = false;
        $result = $prev = new ListNode(0);
        $result->next = $prev;
        while($l1 !== null || $l2 !== null || $overflow){
            $sum = ($l1 ? $l1->val : 0) + ($l2 ? $l2->val : 0) + ($overflow ? 1 : 0);
            $l1 = $l1 ? $l1->next : null;
            $l2 = $l2 ? $l2->next : null;
            if($sum >= 10){
                $overflow = true;
                $sum = $sum % 10;
            }else{
                $overflow = false;
            }
            $prev->next = new ListNode($sum);
            $prev = $prev->next;
        }
        return $result->next;
    }
}