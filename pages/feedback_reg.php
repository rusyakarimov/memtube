<?php
$login = $_POST['name'];
$pass = $_POST['password'];
$email = $_POST['email'];

$user = new User();
$user->register($login, $email, $pass);
