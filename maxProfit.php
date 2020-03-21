<?php

/**
 * 121. 买卖股票的最佳时机
 * 1567. 面试题63. 股票的最大利润
 * Class MaxProfitSolution
 * https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock/
 */
class MaxProfitSolution {

    /**
     * 较为简单，需要注意的是遍历时比较差值，不要比较低点
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        //低点
        $min = null;
        //差值
        $profit = 0;
        foreach($prices as $price){
            if($min !== null){
                $profit = max($price - $min,$profit);
            }
            if($min === null || $min > $price){
                $min = $price;
            }
        }
        return $profit;
    }
}