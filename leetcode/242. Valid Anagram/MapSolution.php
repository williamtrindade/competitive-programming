<?php

/**
 * Given two strings s and t, return true if t is an
 * anagram
 * of s, and false otherwise.
 *
 *
 *
 * Example 1:
 *
 * Input: s = "anagram", t = "nagaram"
 *
 * Output: true
 *
 * Example 2:
 *
 * Input: s = "rat", t = "car"
 *
 * Output: false
 *
 *
 *
 * Constraints:
 *
 * 1 <= s.length, t.length <= 5 * 104
 * s and t consist of lowercase English letters.
 *
 *
 * Follow up: What if the inputs contain Unicode characters? How would you adapt your solution to such a case?
 */
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        $map = [];
        if ($t===$s) return true;
        if (strlen($s)!=strlen($t)) return false;

        for ($i=0;$i<strlen($s);$i++) {
            $map[$s[$i]] = isset($map[$s[$i]]) ? $map[$s[$i]] + 1 : 1;
        }
        for ($j=0;$j<strlen($t);$j++) {
            if (isset($map[$t[$j]])) {
                $map[$t[$j]] = $map[$t[$j]] - 1;
            } else {
                return false;
            }
            if ($map[$t[$j]] === 0) {
                unset($map[$t[$j]]);
            }
        }
        return (count($map)===0);
    }
}