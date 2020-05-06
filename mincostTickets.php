<?php

/**
 * 983. 最低票价
 * Class MincostTicketsSolution
 * https://leetcode-cn.com/problems/minimum-cost-for-tickets/
 */
class MincostTicketsSolution
{

    /**
     * @param Integer[] $days
     * @param Integer[] $costs
     * @return Integer
     */
    function mincostTickets($days, $costs)
    {
        $dp = [0];
        for ($i = 1; $i < 366; $i++) {
            $dp[$i] = in_array($i, $days)
                ? min(
                    $dp[$i - 1 > 0 ? ($i - 1) : 0] + $costs[0],
                    $dp[$i - 7 > 0 ? ($i - 7) : 0] + $costs[1],
                    $dp[$i - 30 > 0 ? ($i - 30) : 0] + $costs[2]
                )
                : $dp[$i - 1];
        }
        return end($dp);
    }
}