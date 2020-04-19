<?php

/**
 * 1519. 面试题 17.11. 单词距离
 * Class FindClosestSolution
 * https://leetcode-cn.com/problems/find-closest-lcci/
 */
class FindClosestSolution
{

    /**
     * 单指针迭代 复杂度 O(n) 适用单次查询
     * @param String[] $words
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function findClosest_1($words, $word1, $word2)
    {
        $res = PHP_INT_MAX;
        $min = 0;
        $is_w1 = null;
        foreach ($words as $i => $word) {
            if ($word == $word1) {
                if ($is_w1 === null) {
                    $is_w1 = true;
                } else if ($is_w1 === false) {
                    $res = min($res, $i - $min);
                    $is_w1 = true;
                }
                $min = $i;
            } else if ($word == $word2) {
                if ($is_w1 === null) {
                    $is_w1 = false;
                } else if ($is_w1 === true) {
                    $res = min($res, $i - $min);
                    $is_w1 = false;
                }
                $min = $i;
            }
        }
        return $res;
    }

    /**
     * 双指针 复杂度 O(n) 适用单次查询
     * @param String[] $words
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function findClosest_2($words, $word1, $word2)
    {
        $res = PHP_INT_MAX;
        $w1 = $w2 = null;
        foreach ($words as $i => $word) {
            if ($word == $word1) {
                $w1 = $i;
                isset($w2) && $res = min($res, $w1 - $w2);
            } else if ($word == $word2) {
                $w2 = $i;
                isset($w1) && $res = min($res, $w2 - $w1);
            }
        }
        return $res;
    }

    /**
     * hash表 适用多次重复查询
     * @param String[] $words
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function findClosest_3($words, $word1, $word2)
    {
        $min = PHP_INT_MAX;
        $dictionary = [];
        foreach ($words as $i => $word) {
            isset($dictionary[$word]) ? $dictionary[$word][] = $i : $dictionary[$word] = [$i];
        }
        $w1_dic = $dictionary[$word1];
        $w2_dic = $dictionary[$word2];
        $i = $j = 0;
        while (isset($w1_dic[$i]) && isset($w2_dic[$j])) {
            $min = min($min, abs($w2_dic[$j] - $w1_dic[$i]));
            $w1_dic[$i] < $w2_dic[$j] ? $i++ : $j++;
        }
        return $min;
    }

    /**
     * 2优化版 利用队列先进先出的特点
     * @param String[] $words
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function findClosest_4($words, $word1, $word2)
    {
        $min = PHP_INT_MAX;
        $dictionary = [];
        foreach ($words as $i => $word) {
            if (isset($dictionary[$word])) {
                $dictionary[$word]->push($i);
            } else {
                $each_queue = new SplQueue();
                $each_queue->push($i);
                $dictionary[$word] = $each_queue;
            }
        }
        $w1_queue = $dictionary[$word1];
        $w2_queue = $dictionary[$word2];
        $w1_queue->rewind();
        $w2_queue->rewind();
        while ($w1_queue->valid() && $w2_queue->valid()) {
            $w1 = $w1_queue->current();
            $w2 = $w2_queue->current();
            $min = min($min, abs($w1 - $w2));
            $w1 < $w2 ? $w1_queue->next() : $w2_queue->next();
        }
        return $min;
    }
}