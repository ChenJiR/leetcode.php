<?php

/**
 * 1509. 面试题17. 打印从1到最大的n位数
 * Class PrintNumbersSolution
 * https://leetcode-cn.com/problems/da-yin-cong-1dao-zui-da-de-nwei-shu-lcof/
 */
class PrintNumbersSolution
{

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function printNumbers($n)
    {
        $str_num = '';
        while ($n > 0) {
            $str_num .= "9";
            $n--;
        }
        $num = intval($str_num);
        $res = [];
        $i = 1;
        while ($i <= $num) {
            $res[] = $i;
            $i++;
        }
        return $res;
    }
}