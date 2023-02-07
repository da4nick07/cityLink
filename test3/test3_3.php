<?php

/*
 * Вариант с наследованием метода класса
 *
 * Наверное самый подходящий
 */


abstract class Trans
{
    abstract static function cargoPrice(int $weight): int;
}

class DHL extends Trans
{
    static function cargoPrice( int $weight): int
    {
        return $weight *100;
    }
}

class PostRF extends Trans
{
    static function cargoPrice( int $weight): int
    {
        if ( $weight <= 10) {
            return 100;
        }
        return 1000;
    }
}

echo DHL::cargoPrice(21);
echo PHP_EOL;

echo PostRF::cargoPrice(21);
echo PHP_EOL;

