<?php require_once ROOT_DIR . '/inc/connect.php';

$name = $_POST['name'];
$desc = $_POST['desc'];

$num_rows = $db->query('SELECT * FROM category WHERE name = ?', $name)->numRows();

if (!$num_rows) {
    $insert = $db->query('INSERT INTO `category` (`name`,`desc`) VALUES (?,?)', $name, $desc); //insert in DB
    $insert->affectedRows();
} else {
    header("Location: error_page");
}


if ($insert) {
    header("Location: /main");
} else {
    header("Location: error_page");
}

require_once ROOT_DIR . '/inc/footer.php';
