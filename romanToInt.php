<?php


/**
 * 13. 罗马数字转整数
 * Class RomanToIntSolution
 * https://leetcode-cn.com/problems/roman-to-integer/
 */
class RomanToIntSolution
{

    /**
     * 完全模拟
     * @param String $s
     * @return Integer
     */
    function romanToInt($s)
    {
        $res = 0;
        $i = 0;
        while ($i < strlen($s)) {
            switch ($s[$i]) {
                case "I":
                    if (isset($s[$i + 1]) && ($s[$i + 1] == "V" || $s[$i + 1] == "X")) {
                        $res += $s[$i + 1] == "V" ? 4 : 9;
                        $i += 2;
                        continue 2;
                    } else {
                        $res += 1;
                    }
                    break;
                case "V":
                    $res += 5;
                    break;
                case "X":
                    if (isset($s[$i + 1]) && ($s[$i + 1] == "L" || $s[$i + 1] == "C")) {
                        $res += $s[$i + 1] == "L" ? 40 : 90;
                        $i += 2;
                        continue 2;
                    } else {
                        $res += 10;
                    }
                    break;
                case "L":
                    $res += 50;
                    break;
                case "C":
                    if (isset($s[$i + 1]) && ($s[$i + 1] == "D" || $s[$i + 1] == "M")) {
                        $res += $s[$i + 1] == "D" ? 400 : 900;
                        $i += 2;
                        continue 2;
                    } else {
                        $res += 100;
                    }
                    break;
                case "D":
                    $res += 500;
                    break;
                case "M":
                    $res += 1000;
                    break;
            }
            $i++;
        }
        return $res;
    }

    /**
     * 优化
     * @param String $s
     * @return Integer
     */
    function romanToInt2($s)
    {
        $dict = ['I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000];
        $res = 0;
        $i = 0;
        while ($i < strlen($s)) {
            $cur = $dict[$s[$i]];
            if (isset($s[$i + 1]) && $dict[$s[$i + 1]] > $cur) {
                $res += ($dict[$s[$i + 1]] - $cur);
                $i += 2;
            } else {
                $res += $cur;
                $i++;
            }
        }
        return $res;
    }
}