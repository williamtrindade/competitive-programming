<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $array_size = count($nums);
        for ($i=0;$i < $array_size;$i++) {
            for ($j=0;$j < $array_size;$j++) {
                if (($nums[$i] + $nums[$j] == $target) && ($i != $j) ) {
                    return [
                        $i, $j 
                    ];
                }
            }
        }
    }
}
