<?php
require_once './inc/connect.php';

if ($_SESSION['status'] == 1) {

    $name = htmlspecialchars(stripslashes($_POST['name']));
    $desc = htmlspecialchars(stripslashes($_POST['desc']));

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header("Location: error_page");
    }
    $newMem = $db->query('UPDATE files SET `name` = ?, `desc` = ? WHERE `id` = ?', $name, $desc, $id)->affectedRows();
    if ($newMem) {
        header('Location: /view?id=' . $id);
    } else {
        header('Location: error_page');
    }
} else {
    header('Location: error_page');
}
