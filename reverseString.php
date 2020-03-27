<?php

/**
 * 344. 反转字符串
 * Class ReverseStringSolution
 * https://leetcode-cn.com/problems/reverse-string/
 */
class ReverseStringSolution
{

    /**
     * 双指针
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s)
    {
        $left = 0;
        $right = count($s) - 1;
        while ($right > $left) {
            $temp = $s[$right];
            $s[$right--] = $s[$left];
            $s[$left++] = $temp;
        }
    }

    /**
     * 递归
     * @param String[] $s
     * @return NULL
     */
    function reverseString2(&$s)
    {
        $this->reverse(count($s) - 1, 0, $s);
    }

    function reverse($right, $left, &$s)
    {
        if ($right > $left) {
            $temp = $s[$right];
            $s[$right] = $s[$left];
            $s[$left] = $temp;

            $this->reverse($right - 1, $left + 1, $s);
        }
    }
}
