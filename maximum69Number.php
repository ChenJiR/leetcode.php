<?php


/**
 * 1323. 6 和 9 组成的最大数字
 * Class Maximum69NumberSolution
 * https://leetcode-cn.com/problems/maximum-69-number/
 */
class Maximum69NumberSolution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    function maximum69Number($num)
    {
        $num = strval($num);
        for ($i = 0; $i < strlen($num); $i++) {
            if ($num[$i] == "6") {
                $num[$i] = "9";
                break;
            }
        }
        return intval($num);
    }

    /**
     * @param Integer $num
     * @return Integer
     */
    function maximum69Number2($num)
    {
        $num = strval($num);
        $i = strpos($num, "6");
        $i !== false && $num[$i] = "9";
        return intval($num);
    }
}