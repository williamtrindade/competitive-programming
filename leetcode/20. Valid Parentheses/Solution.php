<?php

/**
 * Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
 *
 * An input string is valid if:
 *
 * Open brackets must be closed by the same type of brackets.
 * Open brackets must be closed in the correct order.
 * Every close bracket has a corresponding open bracket of the same type.
 *
 *
 * Example 1:
 *
 * Input: s = "()"
 *
 * Output: true
 *
 * Example 2:
 *
 * Input: s = "()[]{}"
 *
 * Output: true
 *
 * Example 3:
 *
 * Input: s = "(]"
 *
 * Output: false
 *
 * Example 4:
 *
 * Input: s = "([])"
 *
 * Output: true
 *
 *
 *
 * Constraints:
 *
 * 1 <= s.length <= 104
 * s consists of parentheses only '()[]{}'.
 */
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $stack = [];
        $map_open = [
            '(' => ')',
            '{' => '}',
            '[' => ']',
        ];
        $map_close = [
            ')' => '(',
            '}' => '{',
            ']' => '[',
        ];
        $s = str_split($s);
        foreach($s as $c) {
            if (array_key_exists($c, $map_open)) {
                $stack[] = $c;
            } else {
                if ($map_close[$c] !== end($stack)) {
                    return false;
                } else {
                    array_pop($stack);
                }
            }
        }
        return !($stack);
    }
}