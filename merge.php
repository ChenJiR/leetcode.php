<?php

/**
 * 1439. 面试题 10.01. 合并排序的数组
 * Class MergeSolution
 * https://leetcode-cn.com/problems/sorted-merge-lcci/
 */
class MergeSolution {

    /**
     * @param Integer[] $A
     * @param Integer $m
     * @param Integer[] $B
     * @param Integer $n
     * @return NULL
     */
    function merge(&$A, $m, $B, $n) {
        foreach($B as $item){
            $A[$m++] = $item;
        }
        sort($A);
    }
}