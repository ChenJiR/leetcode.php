<?php

class Node {
    public $val;
    public $next;
    public $random;

    /**
     * Node constructor.
     * @param Integer $val
     * @param Node $next
     * @param Node $random
     */
    function __construct($val, $next, $random) {
        $this->val = $val;
        $this->next = $next;
        $this->random = $random;
    }
}