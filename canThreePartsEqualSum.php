<?php

/**
 * 1013. 将数组分成和相等的三个部分
 * Class CanThreePartsEqualSumSolution
 * https://leetcode-cn.com/problems/partition-array-into-three-parts-with-equal-sum/
 */
class CanThreePartsEqualSumSolution {

    /**
     * @param Integer[] $A
     * @return Boolean
     */
    static function canThreePartsEqualSum($A) {
        $sum = array_sum($A);
        if($sum % 3 != 0 ){
            return false;
        }
        $target = $sum / 3;
        $each_sum = 0;
        $times = 0;
        $other_sum = 0;
        foreach($A as $a){
            if($times < 3){
                $each_sum += $a;
                if($each_sum == $target){
                    $times ++ ;
                    $each_sum = 0;
                }
            }else{
                $other_sum += $a;
            }
        }
        if($times < 3 || $other_sum != 0){
            return false;
        }
        return true;
    }
}
var_dump(CanThreePartsEqualSumSolution::canThreePartsEqualSum([3,3,6,5,-2,2,5,1,-9,4]));