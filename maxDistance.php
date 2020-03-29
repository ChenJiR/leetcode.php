<?php


/**
 * 1162. 地图分析
 * Class MaxDistanceSolution
 * https://leetcode-cn.com/problems/as-far-from-land-as-possible/
 */
class MaxDistanceSolution
{

    /**
     * 多源BFS
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxDistance($grid)
    {
        $res = 0;
        $ocean = [];
        $map = [];
        foreach ($grid as $y => $line) {
            foreach ($line as $x => $item) {
                if ($item == 1) {
                    $map["$x|$y"] = 0;
                } else {
                    //查询出所有距离为1的海洋
                    if ($grid[$y - 1][$x] == 1 || $grid[$y + 1][$x] == 1 || $grid[$y][$x - 1] == 1 || $grid[$y][$x + 1] == 1) {
                        $map["$x|$y"] = 1;
                        $ocean[] = [$x, $y];
                    } else {
                        $map["$x|$y"] = -1;
                    }
                }
            }
        }
        if (empty($ocean)) {
            return -1;
        }
        while (!empty($ocean)) {
            $res++;
            $deep_ocean = [];
            foreach ($ocean as list($x, $y)) {
                if (isset($map[($x + 1) . "|$y"]) && $map[($x + 1) . "|$y"] === -1) {
                    $deep_ocean[] = [$x + 1, $y];
                    $map[($x + 1) . "|$y"] = $res;
                }
                if (isset($map[($x - 1) . "|$y"]) && $map[($x - 1) . "|$y"] === -1) {
                    $deep_ocean[] = [$x - 1, $y];
                    $map[($x - 1) . "|$y"] = $res;
                }
                if (isset($map["$x|" . ($y + 1)]) && $map["$x|" . ($y + 1)] === -1) {
                    $deep_ocean[] = [$x, $y + 1];
                    $map["$x|" . ($y + 1)] = $res;
                }
                if (isset($map["$x|" . ($y - 1)]) && $map["$x|" . ($y - 1)] === -1) {
                    $deep_ocean[] = [$x, $y - 1];
                    $map["$x|" . ($y - 1)] = $res;
                }
            }
            $ocean = $deep_ocean;
        }
        return $res;
    }

    /**
     * 统计出陆地和海洋 然后暴力法循环遍历 超时解法
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxDistance2($grid)
    {
        $land = [];
        $ocean = [];
        $res = [];
        foreach ($grid as $y => $line) {
            foreach ($line as $x => $item) {
                if ($item == 1) {
                    //剪枝 若为内陆则不再计算陆地
                    if ($grid[$y - 1][$x] != 1 || $grid[$y + 1][$x] != 1 || $grid[$y][$x - 1] != 1 || $grid[$y][$x + 1] != 1) {
                        $land[] = [$x, $y];
                    }
                } else {
                    //直接做一下剪枝，当距离为1时，一定为最小距离，直接计入res，不再进行循环遍历
                    if ($grid[$y - 1][$x] == 1 || $grid[$y + 1][$x] == 1 || $grid[$y][$x - 1] == 1 || $grid[$y][$x + 1] == 1) {
                        $res["$x|$y"] = 1;
                    } else {
                        $ocean[] = [$x, $y];
                    }
                }
            }
        }
        if (empty($land) || empty($ocean)) {
            return -1;
        }
        foreach ($land as $land_item) {
            foreach ($ocean as $ocean_item) {
                $distance = abs($ocean_item[0] - $land_item[0]) + abs($ocean_item[1] - $land_item[1]);
                $res["$ocean_item[0]|$ocean_item[1]"] = isset($res["$ocean_item[0]|$ocean_item[1]"])
                    ? min($res["$ocean_item[0]|$ocean_item[1]"], $distance) : $distance;
            }
        }
        return max($res);
    }
}