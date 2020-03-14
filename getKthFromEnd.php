<?php

/**
 * 1514. 面试题22. 链表中倒数第k个节点
 * Class GetKthFromEndSolution
 * https://leetcode-cn.com/problems/lian-biao-zhong-dao-shu-di-kge-jie-dian-lcof/
 */
class GetKthFromEndSolution
{

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function getKthFromEnd($head, $k)
    {
        $i = 0;
        $node_1 = $node_2 = $head;
        while($node_1->next != null){
            if($i >= $k){
                  $node_2 = $node_2->next;
            }
            $node_1 = $node_1->next;
            $i++;
        }
        return $node_2;
    }

}