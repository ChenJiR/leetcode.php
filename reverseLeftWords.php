<?php

/**
 * 1556. 面试题58 - II. 左旋转字符串
 * Class ReverseLeftWordsSolution
 * https://leetcode-cn.com/problems/zuo-xuan-zhuan-zi-fu-chuan-lcof/
 */
class ReverseLeftWordsSolution {

    /**
     * @param String $s
     * @param Integer $n
     * @return String
     */
    function reverseLeftWords($s, $n) {
        return substr($s,$n) . substr($s,0,$n);
    }
}