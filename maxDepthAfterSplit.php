<?php

/**
 * 1111. 有效括号的嵌套深度
 * Class MaxDepthAfterSplitSolution
 * https://leetcode-cn.com/problems/maximum-nesting-depth-of-two-valid-parentheses-strings/
 */
class MaxDepthAfterSplitSolution
{

    /**
     * @param String $seq
     * @return Integer[]
     */
    function maxDepthAfterSplit($seq)
    {
        $list = [];
        $index = 0;
        foreach (str_split($seq) as $item) {
            if ($item == "(") {
                $index++;
                $list[] = $index % 2;
            } else {
                $index--;
                $list[] = $index % 2;
            }
        }
        return $list;
    }
}