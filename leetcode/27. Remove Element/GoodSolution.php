<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
        $k = 0;
        $nums_len = sizeof($nums);

        for($i = 0; $i < $nums_len; $i++) {
            if ($nums[$i] != $val) {
                $k++;
            } else {
                unset($nums[$i]);
            }
        }
        return $k;
    }
}