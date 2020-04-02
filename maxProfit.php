<?php

/**
 * 121. 买卖股票的最佳时机
 * 122. 买卖股票的最佳时机 II
 * 1567. 面试题63. 股票的最大利润
 * Class MaxProfitSolution
 * https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock/
 * https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock-ii/
 */
class MaxProfitSolution
{

    /**
     * 较为简单，需要注意的是遍历时比较差值，不要比较低点
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        //低点
        $min = null;
        //差值
        $profit = 0;
        foreach ($prices as $price) {
            if ($min !== null) {
                $profit = max($price - $min, $profit);
            }
            if ($min === null || $min > $price) {
                $min = $price;
            }
        }
        return $profit;
    }

    /**
     * 122. 买卖股票的最佳时机 II
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit2($prices)
    {
        //低点(买入点)
        $min = null;
        //利润
        $profit = 0;
        foreach ($prices as $i => $price) {
            if ($min === null && $price < (isset($prices[$i + 1]) ? $prices[$i + 1] : PHP_INT_MIN)) {
                //当前没有买入且为低点(小于下一个值)
                $min = $price;
            }
            if ($min !== null && $price > (isset($prices[$i + 1]) ? $prices[$i + 1] : PHP_INT_MIN)) {
                //有买入点且为高点(大于下一个值)
                $profit += $price - $min;
                $min = null;
            }
        }
        return $profit;
    }
}

var_dump((new MaxProfitSolution())->maxProfit2([2, 1, 2, 0, 1]));