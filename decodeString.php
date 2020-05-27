<?php

/**
 * 394. 字符串解码
 * Class DecodeStringSolution
 * https://leetcode-cn.com/problems/decode-string/
 */
class DecodeStringSolution
{

    /**
     * @param String $s
     * @return String
     */
    function decodeString($s)
    {
        if ($s == "") return "";
        $res = "";
        $n = "";
        $i = 0;
        while ($i < strlen($s)) {
            $str = $s[$i];
            if ($str == "[") {
                $n = $n ? intval($n) : 1;
                $m = 1;
                $child_str = "";
                for ($j = $i + 1; $m > 0; $j++) {
                    $s[$j] == "[" && $m++;
                    $s[$j] == "]" && $m--;
                    $m > 0 && $child_str .= $s[$j];
                }
                $child_str = $this->decodeString($child_str);
                for ($t = 0; $t < $n; $t++) $res .= $child_str;
                $i = $j;
                $n = "";
            } else {
                is_numeric($str) ? $n .= $str : $res .= $str;
                $i++;
            }
        }
        return $res;
    }
}

var_dump((new DecodeStringSolution())->decodeString("3[a]2[bc]"));