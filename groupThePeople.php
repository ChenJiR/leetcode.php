<?php

/**
 * 1282. 用户分组
 * Class GroupThePeopleSolution
 * https://leetcode-cn.com/problems/group-the-people-given-the-group-size-they-belong-to/
 */
class GroupThePeopleSolution
{

    /**
     * @param Integer[] $groupSizes
     * @return Integer[][]
     */
    function groupThePeople($groupSizes)
    {
        $res = $tmp = [];
        foreach ($groupSizes as $i => $size) {
            isset($tmp[$size]) ? $tmp[$size][] = $i : $tmp[$size] = [$i];
            if (count($tmp[$size]) == $size) {
                $res[] = $tmp[$size];
                $tmp[$size] = [];
            }
        }
        return $res;
    }
}