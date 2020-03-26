<?php

/**
 * 999. 车的可用捕获量
 * Class NumRookCapturesSolution
 * https://leetcode-cn.com/problems/available-captures-for-rook/
 */
class NumRookCapturesSolution
{

    /**
     * @param String[][] $board
     * @return Integer
     */
    function numRookCaptures($board)
    {
        $res = 0;
        $rook = null;
        $rook_y = null;
        $rook_line = [];
        foreach ($board as $line) {
            if (in_array("R", $line)) {
                $rook_line[] = $line;
                $rook_y = array_search("R", $line);
                break;
            }
        }
        $y_line = [];
        foreach ($board as $line) {
            $y_line[] = $line[$rook_y];
        }
        $rook_line[] = $y_line;
        foreach ($rook_line as $line) {
            $line_res = 0;
            $is_R = false;
            foreach ($line as $item) {
                $is_R = $is_R || $item == "R";
                if ($is_R) {
                    if ($item == "B") {
                        break;
                    }
                    if ($item == "p") {
                        $line_res++;
                        break;
                    }
                } else {
                    $line_res = $item == "B" ? 0 : ($item == "p" ? 1 : $line_res);
                }
            }
            $res += $line_res;
        }
        return $res;
    }
}