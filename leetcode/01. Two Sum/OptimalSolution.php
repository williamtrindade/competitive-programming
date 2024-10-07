<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $hash_table = [];

        foreach($nums as $index => $num) {
            $diff = $target - $num;
            if (array_key_exists($diff, $hash_table)) {
                return [$index, $hash_table[$diff]];
            } else {
                $hash_table[$num] = $index;
            }
        }
    }
}