<?php

/**
 * 1451. 面试题 16.02. 单词频率
 * Class WordsFrequency
 * https://leetcode-cn.com/problems/words-frequency-lcci/
 */
class WordsFrequency {

    private $word_dictionary = [];

    /**
     * @param String[] $book
     */
    function __construct($book) {
        foreach($book as $word){
            isset($this->word_dictionary[$word]) ? $this->word_dictionary[$word]++ : $this->word_dictionary[$word] = 1;
        }
    }

    /**
     * @param String $word
     * @return Integer
     */
    function get($word) {
        return $this->word_dictionary[$word] ?: 0;
    }
}

/**
 * Your WordsFrequency object will be instantiated and called as such:
 * $obj = WordsFrequency($book);
 * $ret_1 = $obj->get($word);
 */