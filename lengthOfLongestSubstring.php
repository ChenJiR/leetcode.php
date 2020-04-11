<?php

/**
 * 3. 无重复字符的最长子串
 * Class LengthOfLongestSubstringSolution
 * https://leetcode-cn.com/problems/longest-substring-without-repeating-characters/
 */
class LengthOfLongestSubstringSolution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        if ($s == "") {
            return 0;
        }
        $max = 0;
        $result_ary = [];
        foreach (str_split($s) as $item) {
            if (in_array($item, $result_ary)) {
                $max = max(count($result_ary), $max);
                $result_ary = array_slice($result_ary, array_search($item, $result_ary) + 1);
            }
            $result_ary[] = $item;
        }
        return max(count($result_ary), $max);
    }

    /**
     * 滑动窗口优化
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring2($s)
    {
        $ary = [];
        $max = 0;
        for ($i = $j = 0; $i < strlen($s); $i++) {
            if (isset($ary[$s[$i]]) && $ary[$s[$i]] >= $j) {
                $max = max($max, ($i - $j));
                $j = $ary[$s[$i]] + 1;
            }
            $ary[$s[$i]] = $i;
        }
        return $max = max($max, ($i - $j));
    }
}