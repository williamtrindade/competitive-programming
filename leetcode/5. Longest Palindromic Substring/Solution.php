<?php
class Solution {

    public $long_len;
    public $long_str;
    public $memo;

    function longestPalindrome($s)
    {
        $this->isPalindrome($s, 0, strlen($s)-1);

        $res = '';
        for($i = $this->long_str[0];$i <= $this->long_str[1];$i++) {
            $res = $res . $s[$i];
        }
        return $res;
    }

    function isPalindrome($s, $i, $j)
    {
        if (isset($this->memo[$i][$j])) {
            return $this->memo[$i][$j];
        } else {
            if ($i+1<=$j && $j-1>=$i) {
                $this->memo[$i+1][$j] = $this->isPalindrome($s, $i+1, $j);
                $this->memo[$i][$j-1] = $this->isPalindrome($s, $i, $j-1);
            }
        }
        $oj = $j;
        $oi = $i;
        while($i<$j) {
            if ($s[$i] != $s[$j]) {
                return -1;
            }
            $i++;
            $j--;
        }

        if (!isset($this->long_len) || ((($oj-$oi) + 1) > $this->long_len)){
            $this->long_str[0] = $oi;
            $this->long_str[1] = $oj;
            $this->long_len = ($oj-$oi) + 1;
        }
        return 1;
    }
}