<?php

/**
 * 1103. 分糖果 II
 * Class DistributeCandiesSolution
 * https://leetcode-cn.com/problems/distribute-candies-to-people/
 */
class DistributeCandiesSolution {

    /**
     * @param Integer $candies
     * @param Integer $num_people
     * @return Integer[]
     */
    function distributeCandies($candies, $num_people) {
        $result = [];
        $eachCandies = 0;
        while ($candies > 0) {
            for ($i = 0; $i < $num_people; $i++) {
                $eachCandies++;
                if ($candies - $eachCandies <= 0) {
                    $result[$i] += $candies;
                    $candies = 0;
                } else {
                    $result[$i] += $eachCandies;
                    $candies -= $eachCandies;
                }
            }
        }
        return $result;
    }
}