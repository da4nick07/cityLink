<?php


$list = array (
    '09:00-11:00',
    '11:00-13:00',
    '15:00-16:00',
    '17:00-20:00',
    '20:30-21:30',
    '21:30-22:30',
);

function validateInterval(string $val):bool
{
    if ( is_bool( $t1 = strtotime(substr($val,0, 5)) )) {
        return false;
    }

    if ( is_bool( $t2 = strtotime(substr($val,6, 5)) )) {
        return false;
    }

    if ( $t1 === $t2) {
        return false;
    }
    return true;
}

function validateIntersection(string $val):bool
{
    global $list;

    foreach ($list as $l) {
        $t1 = strtotime(substr($l,0, 5));
        $t2 = strtotime(substr($l,6, 5));
        $v1 = strtotime(substr($val,0, 5));
        $v2 = strtotime(substr($val,6, 5));

        // проверяемый интервал либо начался ПОСЛЕ
        // либо закончился ДО
        if ( !(($v1 > $t2) || ($v2 < $t1)) ) {
            return false;
        }
    }

    return true;
}

//$r = validateInterval('13:30-13:31');
//var_dump($r);

$r = validateIntersection('09:00-11:00');
var_dump($r);


