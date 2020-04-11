<?php

/**
 * 567. 字符串的排列
 * Class CheckInclusionSolution
 * https://leetcode-cn.com/problems/permutation-in-string/
 */
class CheckInclusionSolution
{

    /**
     * 滑动窗口
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2)
    {
        $s1_ary = $tmp_ary = str_split($s1);
        $i = 0;
        while ($i <= strlen($s2) - strlen($s1)) {
            if (in_array($s2[$i], $s1_ary)) {
                $j = $i;
                while (!empty($tmp_ary)) {
                    $each_str = $s2[$j];
                    if (in_array($each_str, $tmp_ary)) {
                        unset($tmp_ary[array_search($each_str, $tmp_ary)]);
                    } else if (in_array($each_str, $s1_ary)) {
                        for ($start = $i; $start < $j; $start++) {
                            if ($s2[$start] == $each_str) {
                                $i = $start + 1;
                                break;
                            }
                            $tmp_ary[] = $s2[$start];
                        }
                    } else {
                        $i = $j;
                        $tmp_ary = $s1_ary;
                        break;
                    }
                    $j++;
                }
                if (empty($tmp_ary)) {
                    return true;
                }
            } else {
                $i++;
            }
        }
        return false;
    }
}