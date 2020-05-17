<?php

/**
 * 210. 课程表 II
 * Class FindOrderSolution
 * https://leetcode-cn.com/problems/course-schedule-ii/
 */
class FindOrderSolution
{

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Integer[]
     */
    function findOrder($numCourses, $prerequisites)
    {
        if ($numCourses == 0) return [];
        $map = [];
        $map_times = [];
        for ($i = 0; $i < $numCourses; $i++) {
            $map_times[$i] = 0;
        }
        foreach ($prerequisites as $prerequisite) {
            $map[$prerequisite[1]][] = $prerequisite[0];
            $map_times[$prerequisite[0]]++;
        }
        $queue = [];
        foreach ($map_times as $p => $item) {
            $item == 0 && $queue[] = $p;
        }
        $res = [];
        $count = 0;
        while (!empty($queue)) {
            $count++;
            $p = array_shift($queue);
            $res[] = $p;
            foreach ($map[$p] as $value) {
                $map_times[$value]--;
                if ($map_times[$value] == 0) {
                    $queue[] = $value;
                }
            }
        }
        if ($count == $numCourses) {
            return $res;
        }
        return [];
    }
}