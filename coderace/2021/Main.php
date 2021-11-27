<?php

$main = new Main();
$main();

class Main
{
    // 29701057954
    private const COORDINATES = [
        'alpha' => [
            'lat' => -29.701057954193878,
            'lat_decode' => 20310393085,
            'lng' => 53.52690639743286,
        ],
    ];

    private function decodeNumber(int $number): int
    {
        $newArray = $this->convertStringArrayToIntArray(str_split($number));
        for ($i = 0; $i < 10; $i++) {
            $zero = $newArray[$i];
            $one = $newArray[$i+1];
            unset($newArray[$i]);
            $newZero = $zero + $one;
            $newArray[$i+1] = $newZero;
            var_dump($newArray);

        }
        return 0;
    }

    private function convertStringArrayToIntArray(array $string): array
    {
        return array_map(function ($n) {
            return (int) $n;
        }, $string);
    }

    public function __invoke()
    {
        $alpha = $this->decodeNumber(self::COORDINATES['alpha']['lat_decode']);
        return $alpha;
    }
}
