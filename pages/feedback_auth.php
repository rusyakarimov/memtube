<?php
$login = htmlspecialchars(stripslashes($_POST['name']));
$pass = md5($_POST['password']);

$user = new User();
$user->auth($login, $pass);
