<?php

/**
 * 1299. 将每个元素替换为右侧最大元素
 * Class ReplaceElementsSolution
 * https://leetcode-cn.com/problems/replace-elements-with-greatest-element-on-right-side/
 */
class ReplaceElementsSolution {

    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function replaceElements($arr) {
        $count_arr = count($arr);
        $max = null;
        for ($i=0;$i<$count_arr-1;$i++){
            if($i == 0 || $arr[$i] == $max){
                unset($arr[$i]);
                $max = max($arr);
                $result[] = $max;
            }else{
                $result[] = $max;
                unset($arr[$i]);
            }
        }
        $result[] = -1;
        return $result;
    }
}