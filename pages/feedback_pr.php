<?php
require_once './inc/connect.php';

$email = htmlspecialchars(stripslashes($_POST['email']));

$account = $db->query('SELECT email FROM users WHERE email = ?',  $email);

if ($account->numRows() >= 1) {
    $password = "pass" . rand(1111, 9999);

    $newPass = $db->query('UPDATE users SET password = ? WHERE email = ?', md5($password), $email)->affectedRows();
    if ($newPass) {
        mail($email, "Восстановление пароля(" . $_SERVER['HTTP_HOST'] . ")", "Здравствуйте,ваш новый пароль: " . $password . "\n Изменить его вы можете в вашем личном кабинете. \nС уважением, администрация сайта " . $_SERVER['HTTP_HOST'], "Content-type: text/plain; charset=UTF-8\r\n");
        header('Location: /auth');
    } else {
        header('Location: error_page');
    }
} else {
    header('Location: error_page');
}
