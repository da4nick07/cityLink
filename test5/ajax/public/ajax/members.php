<?php

// директория проекта
define('ROOT_DIR', dirname( __FILE__, 3) . '/');

// подключаем модуль с функциями
require_once ROOT_DIR . 'src/functions.php';

session_start();

// достаём старую таблицу
if ( isset( $_SESSION['old'] )) {
    $vars['_MEMBERS_'] = json_decode($_SESSION['old'], true);
} else {
    $vars['_MEMBERS_'] = [];
}
// обрабатывем ввод
if ( isset($_POST['members'] )) {
    $cres = count($vars['_MEMBERS_']);
    $members = explode(',', $_POST['members']);
    $c = count($members);
    for ($i = 0; $i < $c; $i++) {
        $vars['_MEMBERS_'][] = ['n' => ($cres + $i + 1), 'name' => $members[$i], 'rate' => rand(0, 100)];
    }
    $_SESSION['old'] = json_encode($vars['_MEMBERS_'], true);
}

// обрабатываем сортировку
if ( isset($_POST['sortby']) && ( count($vars['_MEMBERS_']) != 0) ) {
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
             break;
    }
    usort($vars['_MEMBERS_'], 'sorter');
    $vars['_SORTBY_'] = $_POST['sortby'];
    $vars['_DESC_'] = $_POST['desc'];
}

echo renderTpl( ROOT_DIR . 'templates/table.php', $vars);
?>
