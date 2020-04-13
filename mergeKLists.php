<?php

/**
 * 23. 合并K个排序链表
 * Class Solution
 * https://leetcode-cn.com/problems/merge-k-sorted-lists/
 */
class MergeKListsSolution
{

    /**
     * 堆优先队列 复杂度 O(nlogk) k为lists中元素个数
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists)
    {
        $tmp = new MinSplPriorityQueue();
        foreach ($lists as $item) {
            $item && $tmp->insert($item, $item->val);
        }
        $cur = new ListNode(null);
        $res = $cur;
        while ($tmp->valid()) {
            $tmp->top();
            $min_node = $tmp->extract();
            $cur->next = $min_node;
            $min_node->next && $tmp->insert($min_node->next, $min_node->next->val);
            $cur = $cur->next;
        }
        return $res->next;
    }

    /**
     * 暴力法(不推荐) 将所有链表中的元素进入数组后排序，排序完毕再生成新链表。复杂度 O(nlogn)
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists2($lists)
    {
        $tmp = [];
        foreach ($lists as $item) {
            while ($item) {
                $tmp[] = $item->val;
                $item = $item->next;
            }
        }
        //也可以自己写排序算法，这里就不写了
        sort($tmp);
        $cur = new ListNode(null);
        $res = $cur;
        foreach ($tmp as $item) {
            $cur->next = new ListNode($item);
            $cur = $cur->next;
        }
        return $res->next;
    }
}

class MinSplPriorityQueue extends SplPriorityQueue
{
    public function compare($priority1, $priority2)
    {
        return $priority2 - $priority1;
    }
}