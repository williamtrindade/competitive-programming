<?php

$main = new Main();
var_dump($main());

class Main
{
    public function __invoke()
    {
        return 'ola';
    }
}
