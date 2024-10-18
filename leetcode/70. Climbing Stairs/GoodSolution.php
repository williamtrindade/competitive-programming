<?php

class Solution {

    public $memo = [];
    
    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        if ($n < 3) {
            return $n;
        }

        if ($this->memo[$n-2]) {
            $total += $this->memo[$n-2];
        } else {
            $this->memo[$n-2] = $this->climbStairs($n-2);
            $total += $this->memo[$n-2];
        }
        if ($this->memo[$n-1]) {
            $total +=$this->memo[$n-1];
        } else {
            $this->memo[$n-1] = $this->climbStairs($n-1);
            $total += $this->memo[$n-1];
        }
    
        return $total;
    }
}
