<?php
require_once ROOT_DIR . '/inc/config.php';
require_once ROOT_DIR . '/inc/connect.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: error_page");
}

$file = $db->query('SELECT * FROM files WHERE id = ?', $id)->fetchArray();

$dir = "./loads/";

if ($_SESSION['auth'] && $_SESSION['status'] == 1) {

    if (unlink($dir . $file['file']) && unlink($dir . $file['pic'])) { //delete files from directory
        $query = $db->query('DELETE FROM files WHERE id = ?', $id);
        if ($query) {
            header("Location: /");
        } else {
            header("Location: error_page");
        }
    } else {
        header("Location: error_page");
    }
} else {
    header("Location: error_page");
}
