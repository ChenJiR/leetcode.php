<?php

/**
 * 557. 反转字符串中的单词 III
 * Class ReverseWordsSolution
 * https://leetcode-cn.com/problems/reverse-words-in-a-string-iii/
 */
class ReverseWordsSolution
{

    /**
     * 这里不使用自带函数 strrev() 或 array_reverse()
     * @param String $s
     * @return String
     */
    function reverseWords($s)
    {
        $word = explode(" ", $s);
        $res = "";
        foreach ($word as $w) {
            for ($i = strlen($w) - 1; $i >= 0; $i--) {
                $res .= $w[$i];
            }
            $res .= " ";
        }
        return trim($res);
    }
}