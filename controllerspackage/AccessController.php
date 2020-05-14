<?php
declare(strict_types=1);

include_once '../adapterspackage/DBConnectionFactory.php';

$db = DBConnectionFactory::getConnection();
$datauser = [];
$ok = 0;
$usuari = filter_input(INPUT_POST, 'user');
$password = filter_input(INPUT_POST, 'passwd');
$register = filter_input(INPUT_POST, 'register');

if ($register) {
    $query = "INSERT INTO users (name,password) VALUES ('" . $usuari . "','" . $password . "');";
    $ok = $db->executeQuery($query);
} else {
    $query = "SELECT id FROM users WHERE name = '" . $usuari . "' and password = '" . $password . "';";
    $db->executeQuery($query, $datauser);
    $ok = $datauser[0]['id'];
}
if ($ok) {
    $query = "SELECT id, name, level, points FROM users WHERE name = '" . $usuari . "';";
    $db->executeQuery($query, $datauser);
    setcookie('userid', $datauser[0]['id'], 0, '/', 'localhost');
    setcookie('username', $datauser[0]['name'], 0, '/', 'localhost');
    setcookie('userlevel', $datauser[0]['level'], 0, '/', 'localhost');
    setcookie('userpoints', $datauser[0]['points'], 0, '/', 'localhost');
    header('location: ../viewspackage/MainView.php');
} else {
    header('location: ../viewspackage/BadLogin.php');
}