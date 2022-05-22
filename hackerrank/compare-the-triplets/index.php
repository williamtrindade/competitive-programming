<?php

// Complete the compareTriplets function below.
function compareTriplets($a, $b)
{
    $alice = 0;
    $bob   = 0;
    for ($i = 0; $i < 3; $i++ ) {
        $alice = $alice + (($a[$i] > $b[$i]) ? 1 : 0);
        $bob   = $bob   + (($b[$i] > $a[$i]) ? 1 : 0);
    }
    return [$alice, $bob];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$b_temp = rtrim(fgets(STDIN));

$b = array_map('intval', preg_split('/ /', $b_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = compareTriplets($a, $b);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
