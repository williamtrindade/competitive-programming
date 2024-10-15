class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $threshold
     * @return Integer
     */
    function longestAlternatingSubarray($nums, $threshold) {
        $return = 0;
        $longest = 0;
        $even = true;

        foreach($nums as $n) {
            if (
                (($n % 2 == 0 && $even) || ($n % 2 != 0 && !$even)) && $n <= $threshold
            ) {
                $even = !$even;
                $longest++;
            } else {
                $longest = 0;
                $even = true;

                if ($n % 2 == 0 && $n <= $threshold) {
                    $longest = 1;
                    $even = false;
                }
            }
            if ($longest > $return) $return = $longest;
        }
        return $return;
    }
}
