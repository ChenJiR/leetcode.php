<?php

/**
 *
 * 237. 删除链表中的节点
 * https://leetcode-cn.com/problems/delete-node-in-a-linked-list/
 * 1515. 面试题18. 删除链表的节点
 * https://leetcode-cn.com/problems/shan-chu-lian-biao-de-jie-dian-lcof/submissions/
 *
 * Class DeleteNodeSolution
 *
 */
class DeleteNodeSolution {

    /**
     * 237
     * @param ListNode $node
     * @return void
     */
    function deleteNode_237($node) {
        $node->val = $node->next->val;
        $node->next = $node->next->next;
    }

    /**
     * 1515
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    function deleteNode_1515($head, $val) {
        if($head->val == $val){
            if($head->next == null){
                return null;
            }
            $head->val = $head->next->val;
            $head->next = $head->next->next;
        }else{
            $head->next = $this->deleteNode_1515($head->next,$val);
        }
        return $head;
    }
}