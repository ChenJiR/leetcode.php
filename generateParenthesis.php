<?php

/**
 * 22. 括号生成
 * Class GenerateParenthesisSolution
 * https://leetcode-cn.com/problems/generate-parentheses/
 */
class GenerateParenthesisSolution
{

    private $res;

    /**
     * DFS递归生成
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n)
    {
        $this->generate("", [], $n);
        return $this->res;
    }

    function generate($str, $stack, $rest_n)
    {
        if ($rest_n <= 0) {
            foreach ($stack as $item) {
                $str .= ")";
            }
            $this->res[] = $str;
            return;
        }
        if (empty($stack)) {
            $this->generate("$str(", ["("], $rest_n - 1);
            return;
        }
        $this->generate("$str(", array_merge($stack, ["("]), $rest_n - 1);
        array_pop($stack);
        $this->generate("$str)", $stack, $rest_n);
    }
}