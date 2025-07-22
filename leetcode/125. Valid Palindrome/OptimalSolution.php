<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $i=0;
        $j=strlen($s)-1;
        while($i<$j) {
            $chri = strtolower($s[$i]);
            $chrj = strtolower($s[$j]);
            $ascii_str_code_i = ord($chri);
            $ascii_str_code_j = ord($chrj);

            if (($ascii_str_code_i < 97 || $ascii_str_code_i > 122) && ($ascii_str_code_i < 48 || $ascii_str_code_i > 57)) {
                $i++;
                continue;
            }
            if (($ascii_str_code_j < 97 || $ascii_str_code_j > 122) && ($ascii_str_code_j < 48 || $ascii_str_code_j > 57)) {
                $j--;
                continue;
            }
            if ($chri != $chrj) {
                return false;
            }
            $i++;
            $j--;
        }
        return true;
    }
}

/**
 * A phrase is a palindrome if, after converting all uppercase letters into lowercase letters and removing all non-alphanumeric characters, it reads the same forward and backward. Alphanumeric characters include letters and numbers.
 *
 * Given a string s, return true if it is a palindrome, or false otherwise.
 *
 *
 *
 * Example 1:
 *
 * Input: s = "A man, a plan, a canal: Panama"
 * Output: true
 * Explanation: "amanaplanacanalpanama" is a palindrome.
 * Example 2:
 *
 * Input: s = "race a car"
 * Output: false
 * Explanation: "raceacar" is not a palindrome.
 * Example 3:
 *
 * Input: s = " "
 * Output: true
 * Explanation: s is an empty string "" after removing non-alphanumeric characters.
 * Since an empty string reads the same forward and backward, it is a palindrome.
 *
 *
 * Constraints:
 *
 * 1 <= s.length <= 2 * 105
 * s consists only of printable ASCII characters.
 */