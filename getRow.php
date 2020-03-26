<?php

/**
 * 119. 杨辉三角 II
 * Class GetRowSolution
 * https://leetcode-cn.com/problems/pascals-triangle-ii/
 */
class GetRowSolution
{

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex)
    {
        $res = [];
        $cur = 1;
        for ($i = 0; $i <= $rowIndex; $i++) {
            $res[] = $cur;
            $cur = $cur * ($rowIndex - $i) / ($i + 1);
        }
        return $res;
    }
}