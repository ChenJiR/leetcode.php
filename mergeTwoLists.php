<?php

/**
 * 21. 合并两个有序链表
 * 1520. 面试题25. 合并两个排序的链表
 * Class MergeTwoListsSolution
 * https://leetcode-cn.com/problems/merge-two-sorted-lists/
 * https://leetcode-cn.com/problems/he-bing-liang-ge-pai-xu-de-lian-biao-lcof/
 */
class MergeTwoListsSolution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $prev = new ListNode(null);
        $list = $prev;
        while($l1 != null && $l2 != null){
            if($l1->val >= $l2->val){
                $prev->next = new ListNode($l2->val);
                $l2 = $l2->next;
            }else{
                $prev->next = new ListNode($l1->val);
                $l1 = $l1->next;
            }
            $prev = $prev->next;
        }
        $prev->next = $l1 == null ? $l2 : $l1;
        return $list->next;
    }
}