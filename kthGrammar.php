<?php

/**
 * 779. 第K个语法符号
 * Class KthGrammarSolution
 * https://leetcode-cn.com/problems/k-th-symbol-in-grammar/
 */
class KthGrammarSolution
{

    /**
     * @param Integer $N
     * @param Integer $K
     * @return Integer
     */
    function kthGrammar($N, $K)
    {
        if ($K == 1) {
            return 0;
        }
        $a = $this->kthGrammar($N, ($K + 1) / 2);
        $b = $a == 0 ? 1 : 0;
        return $K % 2 == 1 ? $a : $b;
    }
}