<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive(array $nums): int
    {
        $nums_set = [];
        foreach($nums as $num) {
            $nums_set[$num] = 1;
        }

        $longest_streak = 0;

        foreach($nums as $num) {
            // begin of the set
            if (!array_key_exists($num - 1, $nums_set)) {

                $actual_streak = 1;
                while(array_key_exists($num + 1, $nums_set)) {
                    $actual_streak++;
                    $num++;
                }
                if ($actual_streak > $longest_streak) {
                    $longest_streak = $actual_streak;
                }
            }
        }
        return $longest_streak;
    }
}

$solution = new Solution();
$nums = [100, 4, 200, 1, 3, 2];
echo $solution->longestConsecutive($nums); // Saída esperada: 4 (Sequência consecutiva: 1, 2, 3, 4)

$solution = new Solution();
$nums = [10, 5, 15, 3, 20];
echo $solution->longestConsecutive($nums); // Saída esperada: 1 (Cada número é uma sequência de comprimento 1)

$solution = new Solution();
$nums = [-1, -2, 0, 1, 2];
echo $solution->longestConsecutive($nums); // Saída esperada: 5 (Sequência: -2, -1, 0, 1, 2)

$solution = new Solution();

// Gerando lista que mistura números mínimos e máximos dentro do intervalo permitido
$nums = [-109, 109, -109, 109, -109, 109]; // Exemplo de mistura dos limites

echo $solution->longestConsecutive($nums); // Saída esperada: 1 (não há sequência consecutiva)
