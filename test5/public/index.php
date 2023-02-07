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
            $members = htmlentities($_POST['members'], ENT_QUOTES, "UTF-8");
            $members = explode( ', ', $members);
            $vars['_MEMBERS'] = $members;
        }
    }
} else {
    $vars['_METHOD'] = 'GET';
}

echo renderTpl( ROOT_DIR . 'templates/main.php', $vars);
