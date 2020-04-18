<?php

/**
 * 26. 删除排序数组中的重复项
 * https://leetcode-cn.com/problems/remove-duplicates-from-sorted-array/
 * 1047. 删除字符串中的所有相邻重复项
 * https://leetcode-cn.com/problems/remove-all-adjacent-duplicates-in-string/
 *
 * Class RemoveDuplicatesSolution
 */
class RemoveDuplicatesSolution
{

    /**
     * 26
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates_26(&$nums)
    {
        $j = 0;
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] !== $nums[$j]) {
                $j++;
                $nums[$j] = $nums[$i];
            }
        }
        return $j + 1;
    }

    /**
     * 1047 使用双向链表（内存占用低，效率低）
     * @param String $S
     * @return String
     */
    function removeDuplicates_1047_1($S)
    {
        $list = new SplDoublyLinkedList();
        for ($i = 0; $i < strlen($S); $i++) {
            !$list->isEmpty() && $list->top() == $S[$i] ? $list->pop() : $list->push($S[$i]);
        }
        $res = "";
        for ($list->rewind(); $list->valid(); $list->next()) {
            $res .= $list->current();
        }
        return $res;
    }

    /**
     * 1047 使用数组
     * @param String $S
     * @return String
     */
    function removeDuplicates_1047_2($S)
    {
        $stack = [$S[0]];
        for ($i = 1; $i < strlen($S); $i++) {
            end($stack) == $S[$i]
                ? array_pop($stack) : array_push($stack, $S[$i]);
        }
        return implode('', $stack);
    }
}