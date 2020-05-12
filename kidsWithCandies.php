<?php


/**
 * 1431. 拥有最多糖果的孩子
 * Class KidsWithCandiesSolution
 * https://leetcode-cn.com/problems/kids-with-the-greatest-number-of-candies/
 */
class KidsWithCandiesSolution
{

    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies)
    {
        $max = max($candies);
        $res = [];
        foreach($candies as $candy){
            $res[] = $max - $candy <= $extraCandies;
        }
        return $res;
    }
}