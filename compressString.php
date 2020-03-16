<?php

/**
 * 1394. 面试题 01.06. 字符串压缩
 * Class CompressStringSolution
 * https://leetcode-cn.com/problems/compress-string-lcci/
 */
class CompressStringSolution
{

    /**
     * @param String $S
     * @return String
     */
    function compressString($S)
    {
        if($S == ""){
            return "";
        }
        $S_ary = str_split($S);
        $res = "";
        $now = $S_ary[0];
        $times = 0;
        foreach ($S_ary as $s) {
            if ($now == $s) {
                $times++;
            } else {
                $res = $res . $now . $times;
                $now = $s;
                $times = 1;
            }
        }
        $res = $res . $now . $times;
        return strlen($res) > strlen($S) ? $S : $res;
    }
}