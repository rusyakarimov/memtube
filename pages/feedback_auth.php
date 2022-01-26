<?php
require_once ROOT_DIR . '/inc/connect.php';

$login = $_POST['name'];
$pass = md5($_POST['password']);

$account = $db->query('SELECT * FROM users WHERE username = ? AND password = ?',  $login, $pass)->fetchArray();

if ($account['user_id'] == 1) {
    $_SESSION['status'] = 1;
} else {
    $_SESSION['status'] = 2;
}

if ($account) {
    $_SESSION['name'] = $login;
    $_SESSION['auth'] = true; // пометка об авторизации
    header("Location: /");
} else {
    header("Location: error_page");
}
