<?php

/**
 * 349. 两个数组的交集
 * https://leetcode-cn.com/problems/intersection-of-two-arrays/
 *
 * 1476. 面试题 16.03. 交点
 * https://leetcode-cn.com/problems/intersection-lcci/
 *
 * Class IntersectionSolution
 *
 */
class IntersectionSolution
{

    /**
     * 349. 两个数组的交集
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection_349($nums1, $nums2)
    {
        $res = [];
        foreach (array_unique($nums1) as $n) {
            if (in_array($n, $nums2)) {
                $res[] = $n;
            }
        }
        return $res;
    }

    /**
     * 1476. 面试题 16.03. 交点
     * @param Integer[] $start1
     * @param Integer[] $end1
     * @param Integer[] $start2
     * @param Integer[] $end2
     * @return Float[]
     */
    function intersection_1476($start1, $end1, $start2, $end2)
    {
        list($xstart1, $ystart1) = $start1;
        list($xend1, $yend1) = $end1;
        list($xstart2, $ystart2) = $start2;
        list($xend2, $yend2) = $end2;
        //求 y = kx + b 中的 k 和 b
        $get_kb = function ($x1, $y1, $x2, $y2) {
            //若为水平线则 y = 0x + b
            if ($y1 == $y2) {
                return [0, $y1];
            }
            $k = ($y2 - $y1) / ($x2 - $x1);
            $b = (($y2 + $y1) - (($x2 + $x1) * $k)) / 2;
            return [$k, $b];
        };
        $get_result = function ($xstart1, $ystart1, $xend1, $yend1, $xstart2, $ystart2, $xend2, $yend2, $overturn = false) use ($get_kb) {
            list($k1, $b1) = $get_kb($xstart1, $ystart1, $xend1, $yend1);
            list($k2, $b2) = $get_kb($xstart2, $ystart2, $xend2, $yend2);
            //斜率相同, 相交或平行
            if ($k1 == $k2) {
                //相交
                if ($b1 == $b2) {
                    //判断是否重合
                    $xmax = max($xstart1, $xstart2, $xend1, $xend2);
                    $xmin = min($xstart1, $xstart2, $xend1, $xend2);
                    $xtotal = $xmax - $xmin;
                    $x1_length = abs($xstart1 - $xend1);
                    $x2_length = abs($xstart2 - $xend2);
                    //不重合
                    if ($xtotal > $x1_length + $x2_length) {
                        return [];
                    } else {
                        //若为翻转 则要求最大X，对应的是最小Y=-X ，否则求最小X
                        if ($overturn) {
                            $xmax1 = max($xstart1, $xend1);
                            $x = $xmax == $xmax1 ? max($xstart2, $xend2) : $xmax1;
                        } else {
                            $xmin1 = min($xstart1, $xend1);
                            $x = $xmin == $xmin1 ? min($xstart2, $xend2) : $xmin1;
                        }
                        return [$x, round($k1 * $x + $b1, 6)];
                    }
                } else {
                    //斜率相同，且不相交则平行
                    return [];
                }
            } else {
                $x = ($b1 - $b2) / ($k2 - $k1);
                $y = $k1 * $x + $b1;
                return [round($x, 6), round($y, 6)];
            }
        };

        //其中一条线或两条线为竖直线段，将xy轴直接反转求反转后的结果 y,-x
        if ($xstart1 == $xend1 || $xstart2 == $xend2) {
            $result = $get_result(-$ystart1, $xstart1, -$yend1, $xend1, -$ystart2, $xstart2, -$yend2, $xend2, true);
            $intersection = empty($result) ? [] : [$result[1], -$result[0]];
        } else {
            $intersection = $get_result($xstart1, $ystart1, $xend1, $yend1, $xstart2, $ystart2, $xend2, $yend2);
        }

        //没有交点直接返回
        if (empty($intersection)) return $intersection;
        //有交点 看看交点是否在两个线段上
        list($x, $y) = $intersection;
        if (
            ($x <= max($xstart1, $xend1) && $x >= min($xstart1, $xend1)) &&
            ($x <= max($xstart2, $xend2) && $x >= min($xstart2, $xend2))
        ) {
            return $intersection;
        } else {
            return [];
        }
    }
}