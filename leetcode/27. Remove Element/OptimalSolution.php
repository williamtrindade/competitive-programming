<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
        $k = 0;
        foreach ($nums as $num) {
            if ($num != $val) {
                $nums[$k++] = $num;
            }
        }
        return $k;
    }
}