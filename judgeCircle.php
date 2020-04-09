<?php


/**
 * 657. 机器人能否返回原点
 * Class JudgeCircleSolution
 * https://leetcode-cn.com/problems/robot-return-to-origin/
 */
class JudgeCircleSolution
{

    /**
     * @param String $moves
     * @return Boolean
     */
    function judgeCircle($moves)
    {
        $x = $y = 0;
        for ($i = 0; $i < strlen($moves); $i++) {
            switch ($moves[$i]) {
                case "R":
                    $x++;
                    break;
                case "L":
                    $x--;
                    break;
                case "U":
                    $y--;
                    break;
                case "D":
                    $y++;
                    break;
            }
        }
        return $x == 0 && $y == 0;
    }

    /**
     * @param String $moves
     * @return Boolean
     */
    function judgeCircle2($moves)
    {
        return substr_count($moves, "R") == substr_count($moves, "L") &&
            substr_count($moves, "U") == substr_count($moves, "D");
    }
}