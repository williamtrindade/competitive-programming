<?php

function getHitProbability(int $R, int $C, array $G): float {
    // Write your code here
    $total_battleships = 0;
    for ($i = 0; $i < $R; $i++) {
        for ($j = 0; $j < $C; $j++) {
            if ($G[$i][$j] === 1) {
                $total_battleships++;
            }
        }
    }
    return $total_battleships / ($R * $C);
}

// Test cases
function runTests() {
    $testCases = [
        [
            'R' => 2,
            'C' => 3,
            'G' => [[0, 0, 1], [1, 0, 1]],
            'expected' => 0.50000000
        ],
        [
            'R' => 2,
            'C' => 2,
            'G' => [[1, 1], [1, 1]],
            'expected' => 1.00000000
        ],
        [
            'R' => 3,
            'C' => 3,
            'G' => [[0, 0, 0], [0, 0, 0], [0, 0, 1]],
            'expected' => 0.11111111
        ],
        [
            'R' => 3,
            'C' => 3,
            'G' => [[0, 0, 0], [0, 0, 0], [0, 0, 0]],
            'expected' => 0.00000000
        ],
    ];

    foreach ($testCases as $index => $test) {
        $result = getHitProbability($test['R'], $test['C'], $test['G']);
        $expected = $test['expected'];
        $isPass = abs($result - $expected) < 1e-6 ? 'Pass' : 'Fail';
        echo "Test case #".($index + 1).": $isPass (Expected: $expected, Got: $result)\n";
    }
}

// Run tests
runTests();