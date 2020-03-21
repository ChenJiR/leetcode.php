<?php

/**
 * 365. 水壶问题
 * Class CanMeasureWaterSolution
 * https://leetcode-cn.com/problems/water-and-jug-problem/
 */
class CanMeasureWaterSolution
{

    private $x;
    private $y;
    private $z;

    private $result;

    /**
     * 数学方法解题，使用贝祖定理（既 ax+by=z 有解当且仅当 z 是 x,y 的最大公约数的倍数）
     * 在此题目中的应用为
     * 我们认为 最后的结果总能表达为 ax+by，也就是说，每次倒水的操作只会增加或减少X的水量或Y的水量，或者不增不减
     * 支撑此理论的因素为
     * 1. XY互相倒水，总结果不增不减
     * 2. 若XY中均有水，则至少有一个是满的。不可能出现两个都不满的情况
     * 3. 选择将不满的倒满，或将不满的倒空都没有意义。
     * @param $x
     * @param $y
     * @param $z
     * @return bool
     */
    function canMeasureWater($x, $y, $z)
    {
        if ($z < 0 || $z > $x + $y) {
            return false;
        }
        if ($x == 0 || $y == 0) {
            return $z == 0 || $x + $y == $z;
        }
        return $z % $this->gcd($x, $y) == 0;
    }

    /**
     * 辗转相除法求最大公约数
     * @param $a
     * @param $b
     * @return mixed
     */
    function gcd($a, $b)
    {
        return $b == 0 ? $a : $this->gcd($b, $a % $b);
    }

    /**
     * @param Integer $x
     * @param Integer $y
     * @param Integer $z
     * @return Boolean
     */
    function canMeasureWater_BFS1($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->done(0, 0);
        foreach ($this->result as $item) {
            $item = explode(",", $item);
            if ($item[0] + $item[1] == $z) {
                return true;
            }
        }
        return false;
    }

    /**
     * 剪枝递归，小数据可用，数据增大时会超时
     * @param $now_x
     * @param $now_y
     */
    function done($now_x, $now_y)
    {
        if (in_array($now_y . "," . $now_x, $this->result)) {
            //已有结果，跳过
            return;
        }
        $this->result[] = $now_y . "," . $now_x;
        if ($now_x == 0 && $now_y == 0) {
            //当前X,Y均为没水,则选择倒入X或倒入Y
            $this->done($this->x, $now_y);
            $this->done($now_x, $this->y);
        } else if ($now_x == 0) {
            //X没水 ,可选择将X加满 或 Y倒入X
            $this->done($this->x, $now_y);
            $now_y >= $this->x ? $this->done($this->x, $now_y - $this->x) : $this->done($now_y, 0);
        } else if ($now_y == 0) {
            //Y没水 ,可选择将Y加满 或 X倒入Y
            $this->done($now_x, $this->y);
            $now_x >= $this->y ? $this->done($now_x - $this->y, $this->y) : $this->done(0, $now_x);
        } else {
            // XY中均有水，则必有一个是满的
            // 若两个均为满的，则无法再进行操作，直接return
            // 此时，选择将不满的倒满，或将不满的倒空都没有意义
            // 所以有两个选择，1 将满的倒空；2 将满的倒入不满的中
            if ($now_y == $this->y && $now_x == $this->x) {
                return;
            } else if ($now_x == $this->x) {
                //X满
                $this->done(0, $now_y);
                $this->y - $now_y >= $now_x
                    ? $this->done(0, $now_y + $now_x)
                    : $this->done($now_x - ($this->y - $now_y), $this->y);
            } else if ($now_y == $this->y) {
                //Y满
                $this->done($now_x, 0);
                $this->x - $now_x >= $now_y
                    ? $this->done($now_y + $now_x, 0)
                    : $this->done($this->x, $now_y - ($this->x - $now_x));
            }
            return;
        }
    }

    /**
     * 队列模拟递归
     * @param $x
     * @param $y
     * @param $z
     * @return bool
     */
    function canMeasureWater_BFS2($x, $y, $z)
    {
        if ($z < 0 || $z > $x + $y) {
            return false;
        }
        $result = [];
        $stack = [[0, 0]];
        while (!empty($stack)) {
            list($now_x, $now_y) = array_shift($stack);
            if ($now_x == $z || $now_y == $z || $now_x + $now_y == $z) {
                return true;
            }
            if (in_array([$now_x, $now_y], $result)) {
                continue;
            }
            $result[] = [$now_x, $now_y];
            // 加满X
            $stack[] = [$x, $now_y];
            // 加满Y
            $stack[] = [$now_x, $y];
            // 倒空X
            $stack[] = [0, $now_y];
            // 倒空Y
            $stack[] = [$now_x, 0];
            // X倒入Y
            $stack[] = $y - $now_y >= $now_x
                ? [0, $now_x + $now_y] : [$now_x - ($y - $now_y), $y];
            // Y倒入X
            $stack[] = $x - $now_x >= $now_y
                ? [$now_y + $now_x, 0] : [$x, $now_y - ($x - $now_x)];
        }
        return false;
    }
}