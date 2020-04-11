<?php

/**
 * 71. 简化路径
 * Class SimplifyPathSolution
 * https://leetcode-cn.com/problems/simplify-path/
 */
class SimplifyPathSolution
{

    /**
     * @param String $path
     * @return String
     */
    function simplifyPath($path)
    {
        $path_stack = [];
        foreach (explode("/", $path) as $item) {
            switch ($item) {
                case "":
                case ".":
                    break;
                case "..":
                    array_pop($path_stack);
                    break;
                default :
                    $path_stack[] = $item;
            }
        }
        return "/" . implode("/", $path_stack);
    }
}