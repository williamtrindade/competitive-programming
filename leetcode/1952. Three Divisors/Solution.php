<?php

/**
 * Given an integer n, return true if n has exactly three positive divisors. Otherwise, return false.
 *
 * An integer m is a divisor of n if there exists an integer k such that n = k * m.
 *
 *
 *
 * Example 1:
 *
 * Input: n = 2
 * Output: false
 * Explantion: 2 has only two divisors: 1 and 2.
 * Example 2:
 *
 * Input: n = 4
 * Output: true
 * Explantion: 4 has three divisors: 1, 2, and 4.
 *
 *
 * Constraints:
 *
 * 1 <= n <= 104
 */
class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isThree($n) {
        $result = 0;
        for ($i = 1; $i <= $n; $i++) {
            $test = ($n % $i) == 0;
            if ($test) $result++;
            if ($result > 3) break;
        }
        return $result === 3;
    }
}