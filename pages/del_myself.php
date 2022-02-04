<?php
require_once ROOT_DIR . '/inc/connect.php';

if (!empty($_GET['name'])) {
    $name = $_GET['name'];
} else {
    header("Location: error_page");
}

if ($_SESSION['auth'] && $_SESSION['name'] = $name) {

    $query = $db->query('DELETE FROM users WHERE username = ?', $name);

    if ($query) {
        header("Location: logout");
    } else {
        header("Location: error_page");
    }
} else {
    header("Location: error_page");
}
