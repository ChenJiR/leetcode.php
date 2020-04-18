<?php

/**
 * 451. 根据字符出现频率排序
 * Class FrequencySortSolution
 * https://leetcode-cn.com/problems/sort-characters-by-frequency/
 */
class FrequencySortSolution
{

    /**
     * hash
     * @param String $s
     * @return String
     */
    function frequencySort($s)
    {
        $tmp = [];
        for ($i = 0; $i < strlen($s); $i++) {
            isset($tmp[$s[$i]]) ? $tmp[$s[$i]]++ : $tmp[$s[$i]] = 1;
        }
        arsort($tmp);
        $res = "";
        foreach ($tmp as $k => $item) {
            for ($i = 0; $i < $item; $i++) {
                $res .= $k;
            }
        }
        return $res;
    }
}