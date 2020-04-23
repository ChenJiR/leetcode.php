<?php

/**
 * 1481. 面试题 08.11. 硬币
 * Class WaysToChangeSolution
 * https://leetcode-cn.com/problems/coin-lcci/
 */
class WaysToChangeSolution
{

    /**
     * 超时解
     * @param Integer $n
     * @return Integer
     */
    function waysToChange($n)
    {
        $res = 0;
        //可以循环多少个25
        $n25 = intval($n / 25);
        for ($a = 0; $a <= $n25; $a++) {
            //25硬币分别取a个，剩余的金额
            $surplus_25n = $n - (25 * $a);
            //剩余金额可以循环多少个10
            $n10 = intval($surplus_25n / 10);
            for ($b = 0; $b <= $n10; $b++) {
                //10硬币分别取b个，剩余的金额
                $surplus_10n = $surplus_25n - (10 * $b);
                //最终剩余金额可以有多少个5，注意，这里必须加1 ，因为并未考虑不取任何5分硬币的情况
                $n5 = intval($surplus_10n / 5) + 1;
                $res += $n5;
                $res %= 1000000007;
            }
        }
        return $res;
    }

    /**
     * 优化
     * @param Integer $n
     * @return Integer
     */
    function waysToChange_2($n)
    {
        $res = 0;
        //可以循环多少个25
        $n25 = intval($n / 25);
        for ($a = 0; $a <= $n25; $a++) {
            //25硬币分别取a个，剩余的金额
            $surplus_25n = $n - (25 * $a);

            //取项数，也就是剩余金额可以循环多少个10
            $n10 = intval($surplus_25n / 10);
            //取最小项，也就是当10硬币取最多时，5分硬币有几种表示法
            $min_5n = intval(($surplus_25n - (10 * $n10)) / 5) + 1;
            //取最大项，也就是当不取10硬币时，5分硬币有几种表示法
            $max_5n = intval($surplus_25n / 5) + 1;
            //等差数列求解 (最小项 + 最大项) * 项数 / 2
            $res += ($min_5n + $max_5n) * ($n10 + 1) / 2;
            $res %= 1000000007;
        }
        return $res;
    }
}