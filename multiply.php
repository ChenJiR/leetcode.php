<?php

/**
 * 43. 字符串相乘
 * Class MultiplySolution
 * https://leetcode-cn.com/problems/multiply-strings/
 */
class MultiplySolution
{

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply($num1, $num2)
    {
        if ($num1 === "0" || $num2 === "0") return "0";
        $dict = ["0" => 0, "1" => 1, "2" => 2, "3" => 3, "4" => 4, "5" => 5, "6" => 6, "7" => 7, "8" => 8, "9" => 9];
        $res = 0;
        $x1 = "";

        $sum = function ($s1, $s2) use ($dict) {
            if (!$s1 || !$s2) return $s1 ? $s1 : $s2;
            $s1_length = strlen($s1);
            $s2_length = strlen($s2);
            $i = 1;
            $res = "";
            $added = false;
            while ($s1_length - $i >= 0 || $s2_length - $i >= 0) {
                $sum =
                    ($s1_length - $i < 0 ? 0 : $dict[$s1[$s1_length - $i]]) +
                    ($s2_length - $i < 0 ? 0 : $dict[$s2[$s2_length - $i]]) +
                    ($added ? 1 : false);
                if ($sum >= 10) {
                    $sum -= 10;
                    $added = true;
                } else {
                    $added = false;
                }
                $res = strval($sum) . $res;
                $i++;
            }
            return ($added ? "1" : "") . $res;
        };

        for ($i = strlen($num1) - 1; $i >= 0; $i--) {
            $x2 = $x1;
            $each_num = "";
            for ($j = strlen($num2) - 1; $j >= 0; $j--) {
                $each_num = $sum(strval($dict[$num1[$i]] * $dict[$num2[$j]]) . $x2, $each_num);
                $x2 .= "0";
            }
            $x1 .= "0";
            $res = $sum($res, $each_num);
        }
        return $res;
    }
}
