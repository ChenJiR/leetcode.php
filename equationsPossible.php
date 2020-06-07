<?php


/**
 * 990. 等式方程的可满足性
 * Class EquationsPossibleSolution
 * https://leetcode-cn.com/problems/satisfiability-of-equality-equations/
 */
class EquationsPossibleSolution
{

    private $dictionary = [];

    /**
     * @param String[] $equations
     * @return Boolean
     */
    function equationsPossible($equations)
    {
        foreach ($equations as $item) {
            $a = $item[0];
            $b = $item[3];
            if ($item[1] == '=') {
                $this->union($a, $b);
            }
        }
        foreach ($equations as $item) {
            $a = $item[0];
            $b = $item[3];
            if ($item[1] == '!' && $this->find($a) == $this->find($b)) {
                return false;
            }
        }
        return true;
    }

    private function union($index1, $index2)
    {
        $this->dictionary[$this->find($index1)] = $this->find($index2);
    }

    private function find($index)
    {
        !$this->dictionary[$index] && $this->dictionary[$index] = $index;
        while ($this->dictionary[$index] != $index) {
            $this->dictionary[$index] = $this->dictionary[$this->dictionary[$index]];
            $index = $this->dictionary[$index];
        }
        return $index;
    }
}