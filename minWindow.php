<?php

/**
 * 76. 最小覆盖子串
 * Class MinWindowSolution
 * https://leetcode-cn.com/problems/minimum-window-substring/
 */
class MinWindowSolution
{

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t)
    {
        if (!$s || strlen($s) < strlen($t)) return "";
        $t_map = $tmp = [];
        foreach (str_split($t) as $item) {
            $t_map[$item] ? $t_map[$item]++ : $t_map[$item] = 1;
        }
        $min_length = PHP_INT_MAX;
        $res = "";
        $slow = $fast = 0;
        $check = function ($tmp, $t_map) {
            if (count($tmp) != count($t_map)) return false;
            foreach ($t_map as $k => $v) {
                if ($tmp[$k] < $v) return false;
            }
            return true;
        };
        while ($fast < strlen($s)) {
            if (isset($t_map[$s[$fast]])) {
                $tmp[$s[$fast]] ? $tmp[$s[$fast]]++ : $tmp[$s[$fast]] = 1;
            }
            while ($check($tmp, $t_map) && $slow <= $fast) {
                if ($fast - $slow + 1 < $min_length) {
                    $min_length = $fast - $slow + 1;
                    $res = substr($s, $slow, $min_length);
                    if ($min_length == strlen($t)) return $res;
                }
                if (isset($t_map[$s[$slow]])) {
                    if ($tmp[$s[$slow]] == 1) {
                        unset($tmp[$s[$slow]]);
                    } else {
                        $tmp[$s[$slow]]--;
                    }
                }
                $slow++;
            }
            $fast++;
        }
        return $res;
    }
}

var_dump((new MinWindowSolution())->minWindow("ADOBECODEBANCSDFGHBFTJESVCDBSRAEADVCXCNDFSRSHVBSFFAFHWTEAVABCCBNGFMNRWST", "ABC"));