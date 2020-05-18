<?php

/**
 * 1021. 删除最外层的括号
 * Class RemoveOuterParenthesesSolution
 * https://leetcode-cn.com/problems/remove-outermost-parentheses/
 */
class RemoveOuterParenthesesSolution
{

    /**
     * @param String $S
     * @return String
     */
    function removeOuterParentheses($S)
    {
        $stack = [];
        $res = "";
        for ($i = 0; $i < strlen($S); $i++) {
            $s = $S[$i];
            if (empty($stack)) {
                $stack[] = $s;
            } else {
                if ($s == ")") {
                    array_pop($stack);
                    !empty($stack) && $res .= $s;
                } else {
                    $stack[] = $s;
                    $res .= $s;
                }
            }
        }
        return $res;
    }
}