<?php

/**
 * 1426. 面试题 02.01. 移除重复节点
 * Class RemoveDuplicateNodesSolution
 * https://leetcode-cn.com/problems/remove-duplicate-node-lcci/
 */
class RemoveDuplicateNodesSolution
{

    /**
     * hash表缓存已有元素
     * @param ListNode $head
     * @return ListNode
     */
    function removeDuplicateNodes_1($head)
    {
        $ary = [$head->val];
        $cur = $head;
        while ($cur->next) {
            if (in_array($cur->next->val, $ary)) {
                $cur->next = $cur->next->next;
            } else {
                $ary[] = $cur->next->val;
                $cur = $cur->next;
            }
        }
        return $head;
    }

    /**
     * 双指针暴力搜索 超时解
     * @param ListNode $head
     * @return ListNode
     */
    function removeDuplicateNodes_2($head)
    {
        $cur = $head;
        while ($cur->next) {
            $target = $cur->val;
            $search = $cur;
            while ($search->next) {
                if ($search->next->val == $target) {
                    $search->next = $search->next->next;
                } else {
                    $search = $search->next;
                }
            }
            $cur = $cur->next;
        }
        return $head;
    }
}