<?php

/**
 * 690. 员工的重要性
 * Class GetImportanceSolution
 * https://leetcode-cn.com/problems/employee-importance/
 */
class GetImportanceSolution
{
    /**
     * @param Employee[] $employees
     * @param Integer $id
     * @return Integer
     */
    function getImportance($employees, $id)
    {
        $employee_map = [];
        foreach ($employees as $employee) {
            $employee_map[$employee->id] = $employee;
        }
        $res_employee = $employee_map[$id];
        $res = $res_employee->importance;
        $subordinates = $res_employee->subordinates;
        while (!empty($subordinates)) {
            $each = $employee_map[array_shift($subordinates)];
            $res += $each->importance;
            $subordinates = array_merge($subordinates, $each->subordinates);
        }
        return $res;
    }
}

class Employee
{
    public $id = null;
    public $importance = null;
    public $subordinates = array();

    function __construct($id, $importance, $subordinates)
    {
        $this->id = $id;
        $this->importance = $importance;
        $this->subordinates = $subordinates;
    }
}