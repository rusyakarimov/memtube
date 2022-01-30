<?php
require_once ROOT_DIR . '/inc/connect.php';

$login = $_POST['name'];
$pass = md5($_POST['password']);

$account = $db->query('SELECT * FROM users WHERE username = ? AND password = ?',  $login, $pass)->fetchArray();

if ($account['user_id'] == 1) {
    $_SESSION['status'] = 1;
    //$db->query('UPDATE users SET user_status = ? WHERE user_id = ?', "1", $account['user_id'])->affectedRows();
} else {
    $_SESSION['status'] = 2;
}

if ($account) {
    $_SESSION['name'] = $login;
    $_SESSION['auth'] = true; // пометка об авторизации
    $_SESSION['pic'] = $account['profile_pic'];
    header("Location: /main");
} else {
    header("Location: error_page");
}
