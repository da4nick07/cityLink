<?php

/*
 * Вариант с интерфейсом
 *
 */

interface Cargo
{
    function cargoPrice( int $weight): int;
}

class DHL implements Cargo
{
    function cargoPrice( int $weight): int
    {
        return $weight *100;
    }
}

class PostRF implements Cargo
{
    function cargoPrice( int $weight): int
    {
        if ( $weight <= 10) {
            return 100;
        }
//        $weight = $weight -10;
//        return $weight * 1000 +100;
        return 1000;
    }
}

$p = new PostRF;
echo $p->cargoPrice(21);
echo PHP_EOL;

$d = new DHL;
echo $d->cargoPrice(21);
echo PHP_EOL;
