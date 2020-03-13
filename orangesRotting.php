<?php

/**
 * 994. 腐烂的橘子
 * Class OrangesRottingSolution
 * https://leetcode-cn.com/problems/rotting-oranges/
 */
class OrangesRottingSolution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function orangesRotting($grid) {
        $time = 0;
        $goodOranges = 0;
        $badOranges = 0;
//        check
        foreach ($grid as $lineNum => $line) {
            foreach ($line as $itemNum => $item) {
                if ($item == 1) {
                    $goodOranges++;
                    if (isset($line[$itemNum - 1]) && $line[$itemNum - 1] != 0) {
                        continue;
                    }
                    if (isset($line[$itemNum + 1]) && $line[$itemNum + 1] != 0) {
                        continue;
                    }
                    if (isset($grid[$lineNum - 1][$itemNum]) && $grid[$lineNum - 1][$itemNum] != 0) {
                        continue;
                    }
                    if (isset($grid[$lineNum + 1][$itemNum]) && $grid[$lineNum + 1][$itemNum] != 0) {
                        continue;
                    }
                    return -1;
                }
                if($item == 2){
                    $badOranges++;
                }
            }
        }
        if($goodOranges == 0){
            return 0;
        }
        if($badOranges == 0){
            return -1;
        }
//        run
        while ($goodOranges > 0) {
            $toBad = 0;
            $newGrid = $grid;
            foreach ($grid as $lineNum => $line) {
                foreach ($line as $itemNum => $item) {
                    if ($item == 2) {
                        if (isset($line[$itemNum - 1]) && $line[$itemNum - 1] == 1 && $newGrid[$lineNum][$itemNum - 1] != 2) {
                            $newGrid[$lineNum][$itemNum - 1] = 2;
                            $toBad++;
                        }
                        if (isset($line[$itemNum + 1]) && $line[$itemNum + 1] == 1 && $newGrid[$lineNum][$itemNum + 1] != 2) {
                            $newGrid[$lineNum][$itemNum + 1] = 2;
                            $toBad++;
                        }
                        if (isset($grid[$lineNum - 1][$itemNum]) && $grid[$lineNum - 1][$itemNum] == 1 && $newGrid[$lineNum - 1][$itemNum] != 2) {
                            $newGrid[$lineNum - 1][$itemNum] = 2;
                            $toBad++;
                        }
                        if (isset($grid[$lineNum + 1][$itemNum]) && $grid[$lineNum + 1][$itemNum] == 1 && $newGrid[$lineNum + 1][$itemNum] != 2) {
                            $newGrid[$lineNum + 1][$itemNum] = 2;
                            $toBad++;
                        }
                    }
                }
            }
            if($toBad > 0){
                $goodOranges = $goodOranges - $toBad;
            }else{
                return -1;
            }
            $grid = $newGrid;
            $time++;
        }
        return $time;
    }
}