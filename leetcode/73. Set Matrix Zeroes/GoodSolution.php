<?php
class Solution {

    /**
     *
     * @return NULL
     */
    function setZeroes(&$matrix) {
        $row_set = [];
        $column_set = [];

        for ($row=0; $row < count($matrix); $row++) {
            for($column = 0; $column < count($matrix[$row]); $column++) {
                if ($matrix[$row][$column] === 0) {
                    $column_set[$column] = 1;
                    $row_set[$row] = 1;
                }
            }
        }

        for ($row=0; $row < count($matrix); $row++) {
            $set_row = array_key_exists($row, $row_set);
            for($column = 0; $column < count($matrix[$row]); $column++) {
                if ($set_row || array_key_exists($column, $column_set)) {
                    $matrix[$row][$column] = 0;
                }
            }
        }
    }
}


// Função para imprimir a matriz
function printMatrix($matrix) {
    foreach ($matrix as $row) {
        echo implode(" ", $row) . PHP_EOL;
    }
    echo PHP_EOL;
}

// Função para comparar duas matrizes
function compareMatrices($matrix1, $matrix2): bool
{
    if (count($matrix1) !== count($matrix2)) return false;
    for ($i = 0; $i < count($matrix1); $i++) {
        if ($matrix1[$i] !== $matrix2[$i]) return false;
    }
    return true;
}

// Casos de teste
$testCases = [
    [
        'input' => [
            [1, 0],
            [3, 4]
        ],
        'expected' => [
            [0, 0],
            [3, 0]
        ]
    ],
    [
        'input' => [
            [1, 2],
            [3, 4]
        ],
        'expected' => [
            [1, 2],
            [3, 4]
        ]
    ],
    [
        'input' => [
            [1, 2, 3],
            [4, 0, 6],
            [7, 8, 0]
        ],
        'expected' => [
            [1, 0, 0],
            [0, 0, 0],
            [0, 0, 0]
        ]
    ],
    [
        'input' => [
            [0]
        ],
        'expected' => [
            [0]
        ]
    ],
    [
        'input' => [
            [5]
        ],
        'expected' => [
            [5]
        ]
    ],
    [
        'input' => [
            [0, 2, 3],
            [4, 5, 6],
            [7, 8, 0]
        ],
        'expected' => [
            [0, 0, 0],
            [0, 5, 0],
            [0, 0, 0]
        ]
    ]
];

// Variável para contar os testes que passaram
$testsPassed = 0;

foreach ($testCases as $index => $testCase) {
    $matrix = $testCase['input'];
    $expected = $testCase['expected'];

    echo "Caso de teste " . ($index + 1) . ":\n";
    echo "Entrada:\n";
    printMatrix($matrix);

    (new Solution())->setZeroes($matrix);

    echo "Saída:\n";
    printMatrix($matrix);

    echo "Esperado:\n";
    printMatrix($expected);

    // Verifica se o resultado é igual ao esperado
    if (compareMatrices($matrix, $expected)) {
        echo "Resultado: PASSOU\n";
        $testsPassed++;
    } else {
        echo "Resultado: FALHOU\n";
    }

    echo str_repeat("=", 20) . PHP_EOL;
}

// Resumo final
$totalTests = count($testCases);
if ($testsPassed === $totalTests) {
    echo "Todos os $totalTests casos de teste passaram!\n";
} else {
    echo "$testsPassed de $totalTests casos de teste passaram.\n";
}