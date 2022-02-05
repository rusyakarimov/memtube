<?php
require_once './inc/connect.php';

if ($_SESSION['status'] == 1 or $_SESSION['auth']) {

    $name = htmlspecialchars(stripslashes($_POST['name']));
    $desc = htmlspecialchars(stripslashes($_POST['desc']));
    $idCat = $_POST['cat'];

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header("Location: error_page");
    }

    $newMem = $db->query('UPDATE files SET `name` = ?, `desc` = ?, `id_cat` = ? WHERE `id` = ?', $name, $desc, $idCat, $id)->affectedRows();

    if ($newMem) {
        header('Location: /view?id=' . $id);
    } else {
        header('Location: error_page');
    }
} else {
    header('Location: error_page');
}
