<?php

// директория проекта
define('ROOT_DIR', dirname( __FILE__, 2) . '/');

// подключаем модуль с функциями
require_once ROOT_DIR . 'src/functions.php';

session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
}
unset($_SESSION['old']);

echo renderTpl( ROOT_DIR . 'templates/main.php');
