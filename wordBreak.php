<?php

/**
 * 139. 单词拆分
 * Class WordBreakSolution
 * https://leetcode-cn.com/problems/word-break/
 */
class WordBreakSolution
{

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict)
    {
        $dp = [true];
        for ($i = 0; $i < strlen($s); $i++) {
            foreach ($dp as $index => $item) {
                if ($item) {
                    $str = substr($s, $index, ($i + 1) - $index);
                    if (in_array($str, $wordDict)) {
                        $dp[$i + 1] = true;
                        break;
                    }
                }
            }
            !$dp[$i + 1] && $dp[$i + 1] = false;
        }
        return end($dp);
    }
}