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
}