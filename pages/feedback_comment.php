<?php
require_once ROOT_DIR . '/inc/connect.php';

if ($_SESSION['auth']) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header("Location: error_page");
    }

    if (isset($_GET['u'])) {
        $user = $_GET['u'];
    } else {
        header("Location: error_page");
    }

    if (isset($_POST['message'])) {
        $message = htmlspecialchars(stripslashes($_POST['message']));
    } else {
        header("Location: error_page");
    }

    $in = $db->query('INSERT INTO comments (mem_id,author,message,date,time) VALUES (?,?,?,?,?)', $id, $user, $message, date("d.m.y"), time())->affectedRows();
    if ($in) {
        header("Location: /view?id=" . $id);
    }
} else {
    header("Location: error_page");
}
