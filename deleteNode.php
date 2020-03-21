<?php

/**
 * 1515. 面试题18. 删除链表的节点
 * Class DeleteNodeSolution
 * https://leetcode-cn.com/problems/shan-chu-lian-biao-de-jie-dian-lcof/submissions/
 */
class DeleteNodeSolution {

    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    function deleteNode($head, $val) {
        if($head->val == $val){
            if($head->next == null){
                return null;
            }
            $head->val = $head->next->val;
            $head->next = $head->next->next;
        }else{
            $head->next = $this->deleteNode($head->next,$val);
        }
        return $head;
    }
}