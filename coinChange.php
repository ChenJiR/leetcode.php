<?php

/**
 * 322. 零钱兑换
 * Class CoinChangeSolution
 * https://leetcode-cn.com/problems/coin-change/
 */
class CoinChangeSolution {

    private $min = -1;

    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange($coins, $amount) {
        if($amount == 0){
            return 0;
        }
        rsort($coins);
//        $this->addCoin($coins,0,0,$amount);
        $this->getMinCoin($coins, $amount, 0);
        return $this->min;
    }

// 递归加硬币，超时方法
    private function addCoin($coins,$result,$coin_num,$amount){
        if($this->min === $coin_num){
            return;
        }
        foreach($coins as $coin){
            $res = $result + $coin;
            if($res == $amount){
                $this->min = $coin_num + 1;
            }
            if($res < $amount){
                $this->addCoin($coins,$res,$coin_num + 1,$amount);
            }
        }
    }

    /**
     * 递归 减总数额 + 疯狂减枝
     * @param Integer[] $coins 剩余的排序后的硬币数组（一定要为从大到小排序，这样方便剪枝）
     * @param Integer $amount 剩余
     * @param Integer $count
     */
    private function getMinCoin($coins, $amount, $count)
    {
        foreach ($coins as $coin) {
            //剩余的总数额小于面值直接continue
            if($amount < $coin) continue;
            //已经有解的情况下 当剩余钱数/硬币面值依然大于已有解-已用钱数
            //则最好情况为与已有解相同，所以无论有没有解都无需再进行计算了
            //且因为已经排过序，所以后面面值更低的硬币数量即使有解也一定不会比当前解更优，所以直接break
            //核心剪枝！！
            if($this->min != -1 && $amount / $coin >= $this->min - $count) break;
            $max_value_num = floor($amount / $coin);
            //有解 将解赋值
            if ($max_value_num * $coin == $amount) {
                $this->min = $count + $max_value_num;
                break;
            }
            //只剩一个硬币，break掉
            if(count($coins) == 1){
                break;
            }
            $diff_coin = array_diff($coins,[$coin]);
            while ($max_value_num > 0) {
                if ($this->min == -1 || $this->min > $count + $max_value_num) {
                    $this->getMinCoin($diff_coin, $amount - ($max_value_num * $coin), $count + $max_value_num);
                }
                $max_value_num--;
            }
        }
    }
}