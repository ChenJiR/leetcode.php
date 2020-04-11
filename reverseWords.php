<?php

/**
 * 151. 翻转字符串里的单词
 * https://leetcode-cn.com/problems/reverse-words-in-a-string/
 * 557. 反转字符串中的单词 III
 * https://leetcode-cn.com/problems/reverse-words-in-a-string-iii/
 *
 * Class ReverseWordsSolution
 *
 */
class ReverseWordsSolution
{

    /**
     * 151
     * @param String $s
     * @return String
     */
    function reverseWords_151($s)
    {
        //正序
        $word = $res = "";
        for($i=0;$i<strlen($s);$i++){
            if($s[$i] == " "){
                $word && $res = $res ? "$word $res" : $word;
                $word = "";
            }else{
                $word .= $s[$i];
            }
        }
        $word && $res = $res ? "$word $res" : $word;
        return $res;

        //倒序
//        $word = $res = "";
//        for ($i = strlen($s) - 1; $i >= 0; $i--) {
//            if ($s[$i] != " ") {
//                $word = $s[$i] . $word;
//            } else if ($word != "") {
//                $res .= $res ? " $word" : $word;
//                $word = "";
//            }
//        }
//        return $word ? ($res ? "$res $word" : $word) : $res;
    }

    /**
     * 557
     * 这里不使用自带函数 strrev() 或 array_reverse()
     * @param String $s
     * @return String
     */
    function reverseWords_557($s)
    {
        $word = explode(" ", $s);
        $res = "";
        foreach ($word as $w) {
            for ($i = strlen($w) - 1; $i >= 0; $i--) {
                $res .= $w[$i];
            }
            $res .= " ";
        }
        return trim($res);
    }
}