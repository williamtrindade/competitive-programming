<?php

/*
 * Complete the 'diagonalDifference' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY arr as parameter.
 */

function diagonalDifference($arr, $n) {
    $arrFirstDiagonal  = 0;
    $arrSecondDiagonal = 0;

    $arrLength = $n;

    $count = 0;

    for ($i=0; $i < $arrLength; $i++) {
        $arrFirstDiagonal += $arr[$i][$count];
        $count++;
    }

    $count = 0;

    for ($i=$arrLength-1; $i >= 0; $i--) {
        $arrSecondDiagonal += $arr[$i][$count];
        $count++;
    }

    return abs($arrFirstDiagonal - $arrSecondDiagonal);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr = array();

for ($i = 0; $i < $n; $i++) {
    $arr_temp = rtrim(fgets(STDIN));

    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = diagonalDifference($arr, $n);

fwrite($fptr, $result . "\n");

fclose($fptr);
