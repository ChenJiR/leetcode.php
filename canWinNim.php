<?php

/**
 * 292. Nim 游戏
 * Class CanWinNimSolution
 * https://leetcode-cn.com/problems/nim-game/
 */
class CanWinNimSolution
{

    /**
     * 作为先手，如果堆中石头的数量 n 不能被 4 整除，那么你总是可以赢得 Nim 游戏的胜利
     * @param Integer $n
     * @return Boolean
     */
    function canWinNim($n)
    {
        return $n % 4 != 0;
    }
}