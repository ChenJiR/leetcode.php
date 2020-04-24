<?php

/**
 * 1590. 面试题51. 数组中的逆序对
 * Class ReversePairsSolution
 * https://leetcode-cn.com/problems/shu-zu-zhong-de-ni-xu-dui-lcof/
 */
class ReversePairsSolution
{

    /**
     * 暴力 O(n^2)
     * @param Integer[] $nums
     * @return Integer
     */
    function reversePairs_1($nums)
    {
        $res = 0;
        foreach ($nums as $i => $n) {
            for ($j = $i + 1; $j < count($nums); $j++) {
                $n > $nums[$j] && $res++;
            }
        }
        return $res;
    }

    /**
     * 归并排序 超时
     * @param Integer[] $nums
     * @return Integer
     */
    function reversePairs_2($nums)
    {
        $res = 0;
        $tmp = $nums;
        while (count($tmp) > 1) {
            $floor_tmp = [];
            for ($i = 0; $i + 1 < count($tmp); $i += 2) {
                $a = is_array($tmp[$i]) ? $tmp[$i] : [$tmp[$i]];
                $b = is_array($tmp[$i + 1]) ? $tmp[$i + 1] : [$tmp[$i + 1]];
                $each_tmp = [];
                while (!empty($a) && !empty($b)) {
                    if (reset($b) < reset($a)) {
                        $each_tmp[] = array_shift($b);
                        $res += count($a);
                    } else {
                        $each_tmp[] = array_shift($a);
                    }
                }
                empty($a) && $each_tmp = array_merge($each_tmp, $b);
                empty($b) && $each_tmp = array_merge($each_tmp, $a);
                $floor_tmp[] = $each_tmp;
            }
            $i + 1 == count($tmp) && $floor_tmp[] = $tmp[$i];
            $tmp = $floor_tmp;
        }
        return $res;
    }

    /**
     * 归并排序
     * @param Integer[] $nums
     * @return Integer
     */
    function reversePairs_3($nums)
    {
        return $this->helper($nums, 0, count($nums) - 1, 0);
    }

    function helper(&$nums, $left, $right, $res)
    {
        if ($left >= $right) return $res;
        $mid = intval(($left + $right) / 2);
        $res = $this->helper($nums, $left, $mid, $res);
        $res = $this->helper($nums, $mid + 1, $right, $res);

        $i = $left;     // 左数组的下标
        $j = $mid + 1;  // 右数组的下标
        $temp = [];// 临时合并数组
        while ($i <= $mid && $j <= $right) {
            if ($nums[$i] <= $nums[$j]) {
                $temp[] = $nums[$i];
                $i++;
            } else {
                //如果左边部分的数字大于右边的数字
                $res += $mid - $i + 1;
                $temp[] = $nums[$j];
                $j++;
            }
        }

        while ($i <= $mid) {
            $temp[] = $nums[$i];
            $i++;
        }
        while ($j <= $right) {
            $temp[] = $nums[$j];
            $j++;
        }
        for ($k = 0; $k < count($temp); $k++) {
            $nums[$left + $k] = $temp[$k];
        }

        return $res;
    }
}

var_dump((new ReversePairsSolution())->reversePairs_2([7, 5, 6, 4, 4, 6, 3, 2, 6, 2, 1, 6, 96, 4, 48, 5, 4, 3]));