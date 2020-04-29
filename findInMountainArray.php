<?php

/**
 * 1095. 山脉数组中查找目标值
 * Class FindInMountainArraySolution
 * https://leetcode-cn.com/problems/find-in-mountain-array/
 */
class FindInMountainArraySolution
{
    /**
     * @param Integer $target
     * @param MountainArray $mountainArr
     * @return Integer
     */
    function findInMountainArray($target, $mountainArr)
    {
        $l = 0;
        $r = $mountainArr->length() - 1;
        while ($l < $r) {
            $mid = intval($l + (($r - $l) / 2));
            $mountainArr->get($mid) > $mountainArr->get($mid + 1)
                ? $r = $mid : $l = $mid + 1;
        }
        if ($mountainArr->get($r) == $target) return $r;
        $top = $r;
        $l = 0;
        $r = $top;
        while ($l < $r) {
            $mid = intval($l + (($r - $l) / 2));
            $mid_v = $mountainArr->get($mid);
            if ($target == $mid_v) return $mid;
            $target > $mid_v ? $l = $mid + 1 : $r = $mid;
        }
        if ($mountainArr->get($l) == $target) return $l;
        $l = $top;
        $r = $mountainArr->length() - 1;
        while ($l < $r) {
            $mid = intval($l + (($r - $l) / 2));
            $mid_v = $mountainArr->get($mid);
            if ($target == $mid_v) return $mid;
            $target < $mid_v ? $l = $mid + 1 : $r = $mid;
        }
        return $mountainArr->get($l) == $target ? $l : -1;
    }
}


class MountainArray
{
    private $arr = [];

    function get($index)
    {
        return $this->arr[$index];
    }

    function length()
    {
        return count($this->arr);
    }
}