<?php

/**
 * 771. 宝石与石头
 * Class NumJewelsInStonesSolution
 * https://leetcode-cn.com/problems/jewels-and-stones/
 */
class NumJewelsInStonesSolution {

    /**
     * @param String $J
     * @param String $S
     * @return Integer
     */
    function numJewelsInStones($J, $S) {
        $n = 0;
        foreach(str_split($J) as $i){
            $n += substr_count($S,$i);
        }
        return $n;
    }
}