<?php

/**
 * 1435. 面试题 08.07. 无重复字符串的排列组合
 * Class PermutationSolution
 * https://leetcode-cn.com/problems/permutation-i-lcci/
 */
class PermutationSolution
{

    private $dictionary = [];

    /**
     * @param String $S
     * @return String[]
     */
    function permutation($S)
    {
        $this->getDictionary(str_split($S), "");
        return $this->dictionary;
    }

    function getDictionary($S, $res)
    {
        if (empty($S)) {
            $this->dictionary[] = $res;
        } else {
            foreach ($S as $s) {
                $this->getDictionary(array_diff($S, [$s]), $res . $s);
            }
        }
    }

}