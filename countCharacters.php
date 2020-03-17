<?php

/**
 * 1160. 拼写单词
 * Class CountCharactersSolution
 * https://leetcode-cn.com/problems/find-words-that-can-be-formed-by-characters/
 */
class CountCharactersSolution
{

    /**
     * @param String[] $words
     * @param String $chars
     * @return Integer
     */
    function countCharacters($words, $chars)
    {
        $res = 0;
        foreach ($words as $word) {
            if (strlen($word) > strlen($chars)) {
                continue;
            }
            foreach (str_split($word) as $w) {
                if (substr_count($word, $w) > substr_count($chars, $w)) {
                    continue 2;
                }
            }
            $res += strlen($word);
        }
        return $res;
    }
}