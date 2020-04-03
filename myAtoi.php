<?php

/**
 * 8. 字符串转换整数 (atoi)
 * Class MyAtoiSolution
 * https://leetcode-cn.com/problems/string-to-integer-atoi/
 */
class MyAtoiSolution
{

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str)
    {
        $str = trim($str);
        if (isset($str[0]) && (is_numeric($str[0]) || in_array($str[0], ["+", "-"]))) {
            $num = $str[0];
            for ($i = 1; $i < strlen($str); $i++) {
                if ($str[$i] != " " && is_numeric($str[$i])) {
                    $num .= $str[$i];
                } else {
                    break;
                }
            }
            if ($num > 2147483647) {
                return 2147483647;
            }
            if ($num < -2147483648) {
                return -2147483648;
            }
            return intval($num);
        }
        return 0;
    }
}