<?php

// директория проекта
define('ROOT_DIR', dirname( __FILE__, 2) . '/');

// подключаем модуль с функциями
require_once ROOT_DIR . 'src/functions.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vars['_METHOD'] = 'POST';
    $vars['_MEMBERS'] = 'Участники';


    if ( !empty($_POST) ) {
        if ( isset( $_POST['members'] )) {
//            $members = htmlentities($_POST['members'], ENT_QUOTES, "UTF-8");
            $members = $_POST['members'];

            $str = 'проверяемая строка с русскими символами';
            if (!preg_match("/^[а-яА-ЯёЁa-zA-Z,]+$/", $members)) {
                $vars['_ERROR'] = 'Допускаются только буквы и запятая!';
            } else {
                $members = explode( ',', $members);
                $res = [];
                $c = count($members);
                for ( $i=0; $i < $c; $i++) {
                    $res[] = [ 'n'=>$i +1, 'name'=>$members[$i], 'rate'=>rand(0, 100) ];
                }

                $vars['_MEMBERS'] = $res;
            }
        }
    }
} else {
    $vars['_METHOD'] = 'GET';
}

echo renderTpl( ROOT_DIR . 'templates/main.php', $vars);
