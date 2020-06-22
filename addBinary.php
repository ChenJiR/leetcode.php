<?php

/**
 * 67. 二进制求和
 * Class AddBinarySolution
 * https://leetcode-cn.com/problems/add-binary/
 */
class AddBinarySolution
{

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b)
    {
        $i = strlen($a) - 1;
        $j = strlen($b) - 1;
        $carry = false;
        $res = '';
        while ($i >= 0 || $j >= 0) {
            $sum = intval($i < 0 ? 0 : $a[$i--]) + intval($j < 0 ? 0 : $b[$j--]) + ($carry ? 1 : 0);
            if ($sum > 1) {
                $carry = true;
                $res = strval($sum % 2) . $res;
            } else {
                $carry = false;
                $res = strval($sum) . $res;
            }
        }
        return $carry ? "1$res" : $res;
    }
}