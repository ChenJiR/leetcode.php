<?php

/**
 * 1399. 面试题 02.02. 返回倒数第 k 个节点
 * Class KthToLastSolution
 * https://leetcode-cn.com/problems/kth-node-from-end-of-list-lcci/
 */
class KthToLastSolution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return Integer
     */
    function kthToLast($head, $k) {
        $list1 = $list2 = $head;
        while($list1->next != null){
            $list1 = $list1->next;
            $k--;
            if($k <= 0){
                $list2 = $list2->next;
            }
        }
        return $list2->val;
    }
}