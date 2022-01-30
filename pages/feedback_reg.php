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
} elseif (!preg_match("/^[a-zA-Z0-9]+$/", $login)) { //no match
    header("Location: error_page");
} elseif (!preg_match("/^[a-zA-Z0-9]+$/", $pass)) { //no match
    header("Location: error_page");
} else {
    $user_pic = "user.png";
    $insert = $db->query('INSERT INTO users (username,password,email,profile_pic,user_status) VALUES (?,?,?,?,?)', $login, $pass, $email, $user_pic, '2'); //запись в бд
    $insert->affectedRows();

    if ($insert) {
        $_SESSION['auth'] = true; // пометка об авторизации
        $_SESSION['name'] = $login;
        $_SESSION['pic'] = $user_pic;
        header("Location: /main");
    } else {
        header("Location: error_page");
    }
}
