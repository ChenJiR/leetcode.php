<?php

/**
 * 169. 多数元素
 * Class MajorityElementSolution
 * https://leetcode-cn.com/problems/majority-element/
 */
class MajorityElementSolution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $count_ary = [];
        $num = count($nums) / 2;
        foreach ($nums as $i){
            isset($count_ary[$i]) ? $count_ary[$i]++ : $count_ary[$i] = 1;
            if($count_ary[$i] > $num){
                return $i;
            }
        }
        return 0;
    }

    /**
     * 摩尔投票法
     * @param $nums
     * @return int
     */
    function majorityElement2($nums){
        $cnt = $res = 0;
        foreach($nums as $n){
            if($cnt == 0){
                $res = $n;
                $cnt++;
            }else{
                $res == $n ? $cnt++ : $cnt--;
            }
        }
        return $res;
    }
}

var_dump((new MajorityElementSolution())->majorityElement([1]));