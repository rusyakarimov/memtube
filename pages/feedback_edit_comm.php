<?php
require_once './inc/connect.php';

if ($_SESSION['auth'] or $_SESSION['status'] == 1) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header("Location: error_page");
    }
    $message = htmlspecialchars(stripslashes($_POST['message']));
    $newComm = $db->query('UPDATE comments SET `message` = ? WHERE `id` = ?', $message, $id)->affectedRows();

    if ($newComm) {
        header('Location: /main');
    } else {
        header('Location: error_page');
    }
} else {
    header('Location: error_page');
}
