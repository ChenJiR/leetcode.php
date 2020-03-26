<?php

/**
 * 24. 两两交换链表中的节点
 * Class SwapPairsSolution
 * https://leetcode-cn.com/problems/swap-nodes-in-pairs/
 */
class SwapPairsSolution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head) {
        if($head->next->next){
            $head->next->next = $this->swapPairs($head->next->next);
        }
        if($head && $head->next){
            $temp = $head->val;
            $head->val = $head->next->val;
            $head->next->val = $temp;
        }
        return $head;
    }
}