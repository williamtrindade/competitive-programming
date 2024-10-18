<?php

class Solution {

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n) {
        if ($n === 0) return true;

        foreach($flowerbed as $i => $f) {
            if ($f === 1) continue;
            $place_b = $flowerbed[$i-1] === 0 || !array_key_exists($i-1, $flowerbed);
            $place_a = $flowerbed[$i+1] === 0 || !array_key_exists($i+1, $flowerbed);

            if ($i==0 && $place_a) {
                $flowerbed[$i] = 1;
                $n--;
            }
            else if ($i === (count($flowerbed)-1) && $place_b) {
                $flowerbed[$i] = 1;
                $n--;
            } 
            else if ($place_b && $place_a) {
                $flowerbed[$i] = 1;
                $n--;
            }
            if ($n === 0 ) return true;
            if ($n < 0) return false;
        }
        if ($n != 0) return false;
        return true;
    }
}
