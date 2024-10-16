<?php

/**
 * Given a string s, return true if the s can be palindrome after deleting at most one character from it.
 *
 *
 *
 * Example 1:
 *
 * Input: s = "aba"
 * Output: true
 * Example 2:
 *
 * Input: s = "abca"
 * Output: true
 * Explanation: You could delete the character 'c'.
 * Example 3:
 *
 * Input: s = "abc"
 * Output: false
 *
 *
 * Constraints:
 *
 * 1 <= s.length <= 105
 * s consists of lowercase English letters.
 *
 */
class Solution {
    // PSR
    /**
     * @param String $s
     * @return Boolean
     */
    function validPalindrome($s)
    {
        $left = 0;
        $right = strlen($s) - 1;

        while($left < $right) {
            if ($s[$left] !== $s[$right]) {
                return $this->isPalindrome($s, $left+1, $right) || $this->isPalindrome($s, $left, $right-1);
            }

            $left++;
            $right--;
        }
        return true;
    }

    function isPalindrome($s, $left, $right)
    {
        while($left < $right) {
            if ($s[$left] !== $s[$right]) {
                return false;
            }
            $left++;
            $right--;
        }
        return true;
    }
}

echo (new Solution())->validPalindrome("bab");
echo PHP_EOL;
echo (new Solution())->validPalindrome("bab");
