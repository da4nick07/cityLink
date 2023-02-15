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
            if (preg_match("/[^а-яё,]/iu", $members)) {
                $vars['_ERROR'] = 'Допускаются только кириллические буквы и запятая!';
                $vars['_NEW'] = $_POST['members'];
            } else {
                $members = explode(',' , $members);
                $cres = count($res);
                $c = count($members);
                for ( $i=0; $i < $c; $i++) {
                    $res[] = [ 'n'=>($cres +$i +1), 'name'=>$members[$i], 'rate'=>rand(0, 100) ];
                }
            }

            // передаём и пишем в сессию
            $vars['_MEMBERS'] = $res;
            $_SESSION['old'] = json_encode($res, true);

        }
    }
} else {
    $vars['_METHOD'] = 'GET';

    if (!isset($_GET['sortby'])) {
        unset($_SESSION['old']);
    } else {
        $vars['_SORTBY'] = $_GET['sortby'];

        // достаём старую таблицу
        if ( isset( $_SESSION['old'] )) {
            $vars['_MEMBERS'] = json_decode($_SESSION['old'], true);
            switch ($_GET['sortby']) {
                case 0:
                    if ( $_GET['desc0'] == 1) {
                        function sorter(array $a, array $b) {
                            return $b['n'] <=> $a['n'];
                        }
                    } else {
                        function sorter(array $a, array $b) {
                            return $a['n'] <=> $b['n'];
                        }
                    }
                    $vars['_DESC0'] = $_GET['desc0'];
                    break;
                case 1:
                    if ( $_GET['desc1'] == 1) {
                        function sorter(array $a, array $b) {
                            return $b['name'] <=> $a['name'];
                        }
                    } else {
                        function sorter(array $a, array $b) {
                            return $a['name'] <=> $b['name'];
                        }
                    }
                    $vars['_DESC1'] = $_GET['desc1'];
                    break;
                case 2:
                    if ( $_GET['desc2'] == 1) {
                        function sorter(array $a, array $b) {
                            return $b['rate'] <=> $a['rate'];
                        }
                    } else {
                        function sorter(array $a, array $b) {
                            return $a['rate'] <=> $b['rate'];
                        }
                    }
                    $vars['_DESC2'] = $_GET['desc2'];
                    break;
            }
            usort($vars['_MEMBERS'], 'sorter');
        } else {
            $vars['_MEMBERS'] = [];
        }

    }

}

echo renderTpl( ROOT_DIR . 'templates/main.php', $vars);
