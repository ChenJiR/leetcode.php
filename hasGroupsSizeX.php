<?php

/**
 * 914. 卡牌分组
 * Class HasGroupsSizeXSolution
 * https://leetcode-cn.com/problems/x-of-a-kind-in-a-deck-of-cards/
 */
class HasGroupsSizeXSolution
{

    /**
     * 分组后求最大公约数
     * @param Integer[] $deck
     * @return Boolean
     */
    function hasGroupsSizeX($deck)
    {
        if (count($deck) == 1) {
            return false;
        }
        $num_count = [];
        foreach ($deck as $item) {
            isset($num_count[$item]) ? $num_count[$item]++ : $num_count[$item] = 1;
        }
        if (count($num_count) == 1) {
            return true;
        }
        $gcd = array_shift($num_count);
        for ($i = 0; $i < count($num_count); $i++) {
            $gcd = $this->gcd($gcd, $num_count[$i]);
            if ($gcd == 1) {
                return false;
            }
        }
        return true;
    }

    function gcd($a, $b)
    {
        return $b == 0 ? $a : $this->gcd($b, $a % $b);
    }
}

var_dump((new HasGroupsSizeXSolution())->hasGroupsSizeX([1, 2, 3, 4, 4, 3, 2, 1]));