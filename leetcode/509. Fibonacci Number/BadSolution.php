<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function fib($n) {
        if ($n == 1 || $n == 0) {
            return $n;
        }
        return $this->fib($n - 2) + $this->fib($n - 1);
    }
}

// The Fibonacci numbers, commonly denoted F(n) form a sequence, called the Fibonacci sequence, such that each number is the sum of the two preceding ones, starting from 0 and 1. That is,

// F(0) = 0, F(1) = 1
// F(n) = F(n - 1) + F(n - 2), for n > 1.
// Given n, calculate F(n).
