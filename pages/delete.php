<?php
require_once ROOT_DIR . '/inc/config.php';
require_once ROOT_DIR . '/inc/connect.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: error_page");
}
$query = $db->query('DELETE FROM files WHERE id = ?', $id);
if ($query) {
    header("Location: /");
} else {
    header("Location: error_page");
}
