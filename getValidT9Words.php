<?php

/**
 * 1468. 面试题 16.20. T9键盘
 * Class GetValidT9WordsSolution
 * https://leetcode-cn.com/problems/t9-lcci/
 */
class GetValidT9WordsSolution
{

    /**
     * @param String $num
     * @param String[] $words
     * @return String[]
     */
    function getValidT9Words($num, $words)
    {
        $numToWord = [
            2 => ["a", "b", "c"],
            3 => ["d", "e", "f"],
            4 => ["g", "h", "i"],
            5 => ["j", "k", "l"],
            6 => ["m", "n", "o"],
            7 => ["p", "q", "r", "s"],
            8 => ["t", "u", "v"],
            9 => ["w", "x", "y", "z"],
        ];
        foreach (str_split($num) as $i => $item) {
            $nToW = $numToWord[$item];
            foreach ($words as $w => $word){
                if(!in_array(str_split($word)[$i],$nToW)){
                    unset($words[$w]);
                }
            }
        }
        return $words;
    }
}