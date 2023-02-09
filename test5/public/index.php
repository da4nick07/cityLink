<?php

// директория проекта
define('ROOT_DIR', dirname( __FILE__, 2) . '/');

// подключаем модуль с функциями
require_once ROOT_DIR . 'src/functions.php';

session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vars['_METHOD'] = 'POST';
    $vars['_MEMBERS'] = 'Участники';


    if ( !empty($_POST) ) {
        if ( isset( $_POST['members'] )) {

            // достаём старую таблицу
            if ( isset( $_SESSION['old'] )) {
                $res = json_decode($_SESSION['old'], true);
            } else {
                $res = [];
            }

            // обрабатываем ввод
//            $members = htmlentities($_POST['members'], ENT_QUOTES, "UTF-8");
            $members = $_POST['members'];
            if (!preg_match("/^[а-яА-ЯёЁa-zA-Z,]+$/", $members)) {
                $vars['_ERROR'] = 'Допускаются только буквы и запятая!';
                $vars['_NEW'] = $members;
            }else {
                $members = explode( ',', $members);
                $c = count($members);
                for ( $i=0; $i < $c; $i++) {
                    $res[] = [ 'n'=>$i +1, 'name'=>$members[$i], 'rate'=>rand(0, 100) ];
                }
            }
            // передаём и пишем в сессию
            $vars['_MEMBERS'] = $res;
            $_SESSION['old'] = json_encode($res, true);

        }
    }
} else {
    $vars['_METHOD'] = 'GET';
    unset($_SESSION['old']);
}

echo renderTpl( ROOT_DIR . 'templates/main.php', $vars);
