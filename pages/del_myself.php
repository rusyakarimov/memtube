<?php

if (!empty($_GET['name'])) {
    $name = $_GET['name'];
} else {
    header('Location: error_page');
}

$user = new User();
$user->dropAccount($name);
