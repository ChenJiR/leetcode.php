<?php

/**
 * 820. 单词的压缩编码
 * Class MinimumLengthEncodingSolution
 * https://leetcode-cn.com/problems/short-encoding-of-words/
 */
class MinimumLengthEncodingSolution
{

    /**
     * 反转排序
     * @param String[] $words
     * @return Integer
     */
    function minimumLengthEncoding($words)
    {
        foreach ($words as &$word) {
            $word = strrev($word);
        }
        sort($words);
        $res = 0;
        foreach ($words as $k => $w) {
            $strlen = strlen($w);
            if (!isset($words[$k + 1]) || $w != substr($words[$k + 1], 0, $strlen)) {
                $res += $strlen + 1;
            }
        }
        return $res;
    }

    /**
     * 统计字串出现次数进行扣减
     * @param String[] $words
     * @return Integer
     */
    function minimumLengthEncoding2($words)
    {
        $left_nums = 0;
        $words = array_unique($words);
        $str_words = '#' . implode("#", $words) . "#";
        foreach ($words as $k => $w) {
            $_count = substr_count($str_words, $w . '#');
            if ($_count > 1) {
                // 加一次判断，为了避免["time", "atime", "btime"]这种情况而误判为3个重复
                if (substr_count($str_words, '#' . $w . '#') > 1)
                    $left_nums = strlen($w . '#') * ($_count - 1);
                else
                    $left_nums = strlen($w . '#');
            }
        }
        return strlen($str_words) - $left_nums - 1;
    }

}