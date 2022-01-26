<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "Регистрация-ответ";
require_once ROOT_DIR . '/inc/header.php';
require_once ROOT_DIR . '/inc/connect.php';

$login = $_POST['name'];
$pass = md5($_POST['password']);
$email = $_POST['email'];

$account = $db->query('SELECT * FROM users WHERE username = ?', $login)->fetchArray(); //запрос к базе

if ($account['username'] == $login or $account['email'] == $email) { //такой юзер есть
    header("Location: error_page");
} elseif (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
    header("Location: error_page");
} else {

    $insert = $db->query('INSERT INTO users (username,password,email) VALUES (?,?,?)', $login, $pass, $email); //запись в бд
    $insert->affectedRows();

    if ($insert) {
        $_SESSION['auth'] = true; // пометка об авторизации
        header("Location: /");
    } else {
        header("Location: error_page");
    }
}
