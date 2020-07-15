<?php

/**
 * 785. 判断二分图
 * Class IsBipartiteSolution
 * https://leetcode-cn.com/problems/is-graph-bipartite/
 */
class IsBipartiteSolution
{

    /**
     * @param Integer[][] $graph
     * @return Boolean
     */
    function isBipartite($graph)
    {
        $a = 1;
        $b = 2;
        $color = [];

        foreach ($graph as $i => $item) {
            if (!isset($color[$i])) {
                $q = [$i];
                $color[$i] = $a;
                while (!empty($q)) {
                    $node = array_shift($q);
                    $tmp = $color[$node] == $a ? $b : $a;
                    foreach ($graph[$node] as $neighbor) {
                        if (!isset($color[$neighbor])) {
                            $q[] = $neighbor;
                            $color[$neighbor] = $tmp;
                        } else if ($color[$neighbor] != $tmp) {
                            return false;
                        }
                    }
                }
            }
        }
        return true;
    }
}