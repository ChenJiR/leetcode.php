<?php

/**
 * 93. 复原IP地址
 * Class RestoreIpAddressesSolution
 * https://leetcode-cn.com/problems/restore-ip-addresses/
 */
class RestoreIpAddressesSolution
{
    private $res = [];

    /**
     * @param String $s
     * @return String[]
     */
    function restoreIpAddresses($s)
    {
        $this->helper($s, 4, "");
        return $this->res;
    }

    function helper($str, $times, $already_str)
    {
        $strlen = strlen($str);
        if ($strlen == 0) return;
        if ($times == 1) {
            switch ($strlen) {
                case 1:
                    $this->res[] = "$already_str.$str";
                    break;
                case 2:
                    $str[0] != "0" && $this->res[] = "$already_str.$str";
                    break;
                case 3:
                    $str[0] != "0" && intval($str) < 256 && $this->res[] = "$already_str.$str";
                    break;
                default:
                    return;
            }
        } else {
            if ($strlen >= 2) {
                $s1 = substr($str, 0, 1);
                $this->helper(substr($str, 1), $times - 1, $already_str == "" ? $s1 : "$already_str.$s1");
            }
            //若大于两位，则不能以0开头
            if ($strlen >= 3 && $str[0] != "0") {
                $s2 = substr($str, 0, 2);
                $this->helper(substr($str, 2), $times - 1, $already_str == "" ? $s2 : "$already_str.$s2");
            }
            if ($strlen >= 4 && $str[0] != "0") {
                $s3 = substr($str, 0, 3);
                //若为3位 则必须小于256
                intval($s3) < 256 && $this->helper(substr($str, 3), $times - 1, $already_str == "" ? $s3 : "$already_str.$s3");
            }
        }
    }
}
