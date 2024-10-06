<?php

function getWrongAnswers(int $N, string $C): string {
    // Write your code here
    $new_string = "";
    for ($i = 0; $i < $N; $i++) {
        $new_string .= $C[$i] === 'A' ? 'B' : 'A';
    }
    return $new_string;
}
