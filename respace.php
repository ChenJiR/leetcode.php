<?php

/**
 * 1690. 面试题 17.13. 恢复空格
 * Class RespaceSolution
 * https://leetcode-cn.com/problems/re-space-lcci/comments/
 */
class RespaceSolution
{

    /**
     * @param String[] $dictionary
     * @param String $sentence
     * @return Integer
     */
    function respace($dictionary, $sentence)
    {
        $dp = [0];
        for ($i = 0; $i < strlen($sentence); $i++) {
            $dp[$i + 1] = $dp[$i] + 1;
            foreach ($dictionary as $word) {
                $strlen = strlen($word);
                if ($strlen <= $i + 1) {
                    if ($word == substr($sentence, $i + 1 - $strlen, $strlen)) {
                        $dp[$i + 1] = min($dp[$i + 1], $dp[$i + 1 - $strlen]);
                    }
                }
            }
        }
        return end($dp);
    }
}