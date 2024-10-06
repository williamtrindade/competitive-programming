<?php

function getMaxAdditionalDinersCount(int $N, int $K, int $M, array $S): int {
    // Write your code here
    $table = [];
    $return = 0;

    for ($i = 0; $i < $N; $i++) {

        if (in_array($i+1, $S)) {
            continue;
        }

        $can_place = true;
        $index_test = 0;

        for ($j = $i+1; $index_test < $K; $j++) {
            if (in_array($j+1, $S)) {
                $can_place = false;
                break;
            }
            if (!isset($table[$j]) || $table[$j] == 1 ) {
                $can_place = false;
                break;
            }
            $index_test++;
        }
        $index_test = 0;
        for ($j = $i-1; $index_test < $K; $j--) {
            if (in_array($j+1, $S)) {
                $can_place = false;
                break;
            }

            if (!isset($table[$j]) || $table[$j] == 1) {
                $can_place = false;
                break;
            }
            $index_test++;
        }

        if ($can_place) $return++;

    }
    return $return;
}

$entrance = [
    'N' => 15,
    'K' => 2,
    'M' => 3,
    'S' => array(11, 6, 14),
];

echo (
    getMaxAdditionalDinersCount($entrance['N'], $entrance['K'], $entrance['M'], (array)$entrance['S']) . PHP_EOL);