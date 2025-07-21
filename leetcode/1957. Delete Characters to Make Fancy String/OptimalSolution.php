<?php 
class Solution {
   function makeFancyString($s) {
        $result = '';
        $n = strlen($s);

        for ($i = 0; $i < $n; $i++) {
            $len = strlen($result);

            if (
                $len >= 2 &&
                $result[$len - 1] === $s[$i] &&
                $result[$len - 2] === $s[$i]
            ) {
                continue; // pula o caractere para evitar três consecutivos
            }

            $result .= $s[$i]; // adiciona na nova string
        }
        return $result;
    }
}

/**
 * A fancy string is a string where no three consecutive characters are equal.
 * 
 * Given a string s, delete the minimum possible number of characters from s to make it fancy.
 * 
 * Return the final string after the deletion. It can be shown that the answer will always be unique.
 * 
 *  
 * 
 * Example 1:
 * 
 * Input: s = "leeetcode"
 * Output: "leetcode"
 * Explanation:
 * Remove an 'e' from the first group of 'e's to create "leetcode".
 * No three consecutive characters are equal, so return "leetcode".
 * Example 2:
 * 
 * Input: s = "aaabaaaa"
 * Output: "aabaa"
 * Explanation:
 * Remove an 'a' from the first group of 'a's to create "aabaaaa".
 * Remove two 'a's from the second group of 'a's to create "aabaa".
 * No three consecutive characters are equal, so return "aabaa".
 * Example 3:
 * 
 * Input: s = "aab"
 * Output: "aab"
 * Explanation: No three consecutive characters are equal, so return "aab".
 *  
 * 
 * Constraints:
 * 
 * 1 <= s.length <= 105
 * s consists only of lowercase English letters.
 */