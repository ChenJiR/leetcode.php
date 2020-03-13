<?php

/**
 * 791. 自定义字符串排序
 * Class CustomSortStringSolution
 * https://leetcode-cn.com/problems/custom-sort-string/
 */
class CustomSortStringSolution {

    /**
     * @param String $S
     * @param String $T
     * @return String
     */
    function customSortString($S, $T) {
        $sort = str_split($S);
        $result = [];
        $result_text = "";
        foreach(str_split($T) as $i){
            if(in_array($i,$sort)){
                $result[$i] = isset($result[$i]) ? $result[$i].$i : $i;
            }else{
                $result_text .= $i;
            }
        }
        foreach($sort as $s){
            if(isset($result[$s])){
                $result_text .= $result[$s];
            }
        }
        return $result_text;
    }
}