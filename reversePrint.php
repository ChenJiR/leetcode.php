<?php


/**
 * 1497. 面试题06. 从尾到头打印链表
 * Class ReversePrintSolution
 * https://leetcode-cn.com/problems/cong-wei-dao-tou-da-yin-lian-biao-lcof/
 */
class ReversePrintSolution {

    private $reverse = [];
    /**
     * @param ListNode $head
     * @return Integer[]
     */
    function reversePrint($head) {
        $this->getReverseValue($head);
        return $this->reverse;
    }

    function getReverseValue(ListNode $head){
        if($head->next != null){
            $this->getReverseValue($head->next);
        }
        $this->reverse[] = $head->val;
    }
}