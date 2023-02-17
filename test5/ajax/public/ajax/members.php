<?php

// директория проекта
define('ROOT_DIR', dirname( __FILE__, 3) . '/');

// подключаем модуль с функциями
require_once ROOT_DIR . 'src/functions.php';

session_start();

// достаём старую таблицу
if ( isset( $_SESSION['old'] )) {
    $vars['_MEMBERS'] = json_decode($_SESSION['old'], true);
} else {
    $vars['_MEMBERS'] = [];
}
// обрабатывем ввод
if ( isset($_POST['members'] )) {
    $cres = count($vars['_MEMBERS']);
    $members = explode(',', $_POST['members']);
    $c = count($members);
    for ($i = 0; $i < $c; $i++) {
        $vars['_MEMBERS'][] = ['n' => ($cres + $i + 1), 'name' => $members[$i], 'rate' => rand(0, 100)];
    }
    $_SESSION['old'] = json_encode($vars['_MEMBERS'], true);
}

// обрабатываем сортировку
if ( isset($_POST['sortby']) && ( count($vars['_MEMBERS']) != 0) ) {
    switch ($_POST['sortby']) {
        case 0:
            if ( $_POST['desc'] == 1) {
                function sorter(array $a, array $b) {
                    return $b['n'] <=> $a['n'];
                }
            } else {
                function sorter(array $a, array $b) {
                    return $a['n'] <=> $b['n'];
                }
            }
            $vars['_DESC0'] = $_POST['desc'];
            break;
        case 1:
            if ( $_POST['desc'] == 1) {
                function sorter(array $a, array $b) {
                    return $b['name'] <=> $a['name'];
                }
            } else {
                function sorter(array $a, array $b) {
                    return $a['name'] <=> $b['name'];
                }
            }
            $vars['_DESC1'] = $_POST['desc'];
            break;
        case 2:
            if ( $_POST['desc'] == 1) {
                function sorter(array $a, array $b) {
                    return $b['rate'] <=> $a['rate'];
                }
            } else {
                function sorter(array $a, array $b) {
                    return $a['rate'] <=> $b['rate'];
                }
            }
            $vars['_DESC2'] = $_POST['desc'];
            break;
    }
    usort($vars['_MEMBERS'], 'sorter');
}

echo renderTpl( ROOT_DIR . 'templates/table.php', $vars);
?>
