<?php
require_once ROOT_DIR . '/inc/config.php';
require_once ROOT_DIR . '/inc/connect.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: error_page");
}

$author = $_GET['author'];

if ($_SESSION['auth'] && $_SESSION['status'] == 1) {

    $query = $db->query('DELETE FROM comments WHERE id = ?', $id);

    if ($query) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        header("Location: error_page");
    }
} elseif ($_SESSION['auth'] && $_SESSION['name'] == $author && $_SESSION['status'] == 2) {

    $query = $db->query('DELETE FROM comments WHERE id = ?', $id);

    if ($query) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        header("Location: error_page");
    }
} else {
    header("Location: error_page");
}
