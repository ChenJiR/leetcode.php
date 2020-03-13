<?php

/**
 * 206. 反转链表
 * Class ReverseListSolution
 * https://leetcode-cn.com/problems/reverse-linked-list/
 */
class ReverseListSolution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        return $head == null ? null : $this->reverseNode(null,$head);
    }

    function reverseNode($prev,ListNode $node){
        $next = $node->next;
        $node->next = $prev;
        return $next == null ? $node : $this->reverseNode($node,$next);
    }

    function reverseList2($head){
        $prev_node = null;
        $this_node = $head;
        while($this_node){
            $next = $this_node->next;
            $this_node->next = $prev_node;
            $prev_node = $this_node;
            $this_node = $next;
        }
        return $prev_node;
    }
}

var_dump((new ReverseListSolution)->reverseList(null));