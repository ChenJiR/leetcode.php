<?php

/**
 * 347. 前 K 个高频元素
 * Class TopKFrequentSolution
 * https://leetcode-cn.com/problems/top-k-frequent-elements/
 */
class TopKFrequentSolution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k)
    {
        $counter = array_count_values($nums);
        $q = new SplPriorityQueue();
        $q->setExtractFlags(SplPriorityQueue::EXTR_DATA);

        foreach ($counter as $num => $count) {
            $q->insert($num, $count);
        }

        $ans = [];
        for ($i = 0; $i < $k; ++$i) {
            $ans[] = $q->extract();
        }
        return $ans;
    }
}