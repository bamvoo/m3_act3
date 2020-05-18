<?php

session_start();

include_once '../functions/math/BasicOperations.php';
include_once '../adapterspackage/DBConnectionFactory.php';
include_once 'UserDAO.php';
include_once '../modelpackage/User.php';

function initchallenge() {
    $_SESSION['initialized'] = 1;
    $_SESSION['gamelevel'] = 1;
    $_SESSION['oper'] = "+";
    $_SESSION['attempts'] = 0;
    $_SESSION['numoperssuccess'] = 0;
    $_SESSION['challengecompleted'] = 0;
}

function challenge(): string {
    //para cuando el session challenge complete es 1 es que se ha completado y hay que sacar los puntos a pasear
    if (isset($_SESSION['challengecompleted']) and $_SESSION['challengecompleted'] == 1) {
        $points = userRewards();
        finishchallenge();
        return "CONGRATS! CHALLENGE COMPLETED!<br><br>Has aconsseguit $points punts dels 1.000 possibles";
    }
    //si no está inicializado llama a la función para inicializar
    if (isset($_SESSION['initialized']) == null) {
        initchallenge();
    }
    $_SESSION['value1'] = rand(1, 11);
    $_SESSION['value2'] = rand(1, 11);
}
//si es correcto te lleva al siguiente level
function check(int $result): bool {
    $_SESSION['attempts'] = $_SESSION['attempts'] + 1;
    if ($result == operation((int) $_SESSION['value1'], (int) $_SESSION['value2'], $_SESSION['oper'])) {
        $_SESSION['numoperssuccess'] = $_SESSION['numoperssuccess'] + 1;
        if ($_SESSION['numoperssuccess'] == 3) {
            if ($_SESSION['gamelevel'] == 4) {
                $_SESSION['challengecompleted'] = 1;
            } else {               
                $_SESSION['gamelevel'] = $_SESSION['gamelevel'] + 1;
                oper();
                $_SESSION['numoperssuccess'] = 0;
            }
        }
        return true;
    } else {
        $_SESSION['numoperssuccess'] = 0;
        return false;
    }
}
//cambiar entre operadores
function oper() {
    switch ($_SESSION['gamelevel']) {
        case 1: $_SESSION['oper'] = "+";
            break;
        case 2: $_SESSION['oper'] = "-";
            break;
        case 3: $_SESSION['oper'] = "*";
            break;
        case 4 : $_SESSION['oper'] = "/";
            break;
    }
}

function gamelevel() {
    return $_SESSION['gamelevel'];
}

function attempts() {
    return $_SESSION['attempts'];
}

function numoperssuccess() {
    return $_SESSION['numoperssuccess'];
}

function finishchallenge() {
    unset($_SESSION['initialized']);
    unset($_SESSION['gamelevel']);
    unset($_SESSION['oper']);
    unset($_SESSION['attempts']);
    unset($_SESSION['numoperssuccess']);
    unset($_SESSION['challengecompleted']);
}

//esta le da los puntos al usuario al pasar la prueba
function userRewards():int {
    $gamepoints = (12 / (int)$_SESSION['attempts']) * 1000;
    $points = $gamepoints + (int)filter_input(INPUT_COOKIE, 'userpoints');

    setcookie('userpoints', $points, 0, '/', 'localhost');
    $level = (int)filter_input(INPUT_COOKIE, 'userlevel');
    if ($level == 1) {
        $level++;
        setcookie('userlevel', $level, 0, '/', 'localhost');
    }
    $dbconnection = DBConnectionFactory::getConnection();
    $user = new User((int)filter_input(INPUT_COOKIE, 'userid'),
            filter_input(INPUT_COOKIE, 'username'),
            $level, $points);
    $dbuser = new UserDAO($user, $dbconnection);
    $dbuser->updateStatus();
    return $gamepoints;
}
