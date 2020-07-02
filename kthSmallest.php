<?php

/**
 * 378. 有序矩阵中第K小的元素
 * Class KthSmallestSolution
 * https://leetcode-cn.com/problems/kth-smallest-element-in-a-sorted-matrix/
 */
class KthSmallestSolution
{

    /**
     * @param Integer[][] $matrix
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($matrix, $k)
    {
        $PQ = new PQ();
        foreach ($matrix as $n => $line) {
            $PQ->insert($n, $line[0]);
        }
        $PQ->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        $PQ->top();
        $res = $matrix[0][0];
        while ($k > 0) {
            $tmp = $PQ->extract();
            $res = array_shift($matrix[$tmp['data']]);
            if (count($matrix[$tmp['data']]) > 0) {
                $PQ->insert($tmp['data'], $matrix[$tmp['data']][0]);
            }
            $k--;
        }
        return $res;
    }
}

class PQ extends SplPriorityQueue
{
    public function compare($priority1, $priority2)
    {
        return $priority2 - $priority1;
    }
}