<?php

/**
 * 14. 最长公共前缀
 * Class LongestCommonPrefixSolution
 * https://leetcode-cn.com/problems/longest-common-prefix/
 */
class LongestCommonPrefixSolution
{

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs)
    {
        $res = $strs[0] ?: "";
        for ($i = 1; $i < count($strs); $i++) {
            $each_str = $strs[$i];
            $prefix = "";
            for ($s = 0; $s < strlen($res); $s++) {
                if ($each_str[$s] && $res[$s] == $each_str[$s]) {
                    $prefix .= $res[$s];
                } else {
                    break;
                }
            }
            if ($prefix === "") {
                return "";
            }
            $res = $prefix;
        }
        return $res;
    }
}