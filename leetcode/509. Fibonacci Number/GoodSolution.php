<?php


class Solution {

    public $memo = [];

    /**
     * @param Integer $n
     * @return Integer
     */
    function fib($n) {
        if ($n == 1 || $n == 0) {
            return $n;
        }
        if (!$memo[$n]) {
            $fib = $this->fib($n - 2) + $this->fib($n - 1);
            $memo[$n] = $fib;
        }
              
        return $memo[$n];
    }
}

// Complexity Analysis of Fibonacci Function with Memoization

// Time Complexity
// - The recursive implementation of Fibonacci without memoization has an exponential time complexity of \(O(2^n)\) because it recalculates the same subproblems multiple times.
// - With memoization, each Fibonacci number from \(0\) to \(n\) is calculated only once. Therefore, the time complexity becomes \(O(n)\).

// Space Complexity
// The space complexity is \(O(n)\) due to the storage used by the `$memo` array to store calculated results, as well as the call stack from the recursive function calls.

// Summary
// - **Time Complexity**: \(O(n)\)
// - **Space Complexity**: \(O(n)\)
