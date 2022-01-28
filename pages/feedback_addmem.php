<?php
require_once ROOT_DIR . '/inc/connect.php';

$name = $_POST['name'];
$desc = $_POST['desc'];
$cat = $_POST['cat'];

// Set Upload Path
$target_dir = ROOT_DIR . '/loads/';

if (isset($_FILES['userfile']['name'])) {
    if (
        $_FILES['userfile']['type'][0] !== "video/mp4" && $_FILES['userfile']['type'][0] !== "image/gif"
        && $_FILES['userfile']['type'][1] !== "image/png" && $_FILES['userfile']['type'][1] !== "image/jpeg"
    ) {
        header("Location: error_page");
    } else {
        $total_files = count($_FILES['userfile']['name']);
        $insert = $db->query('INSERT INTO `files` (`id_cat`,`file`,`name`, `desc`,`time`,`date`,`user`,`pic`)
                VALUES (?,?,?,?,?,?,?,?)', $cat, $_FILES['userfile']['name'][0], $name, $desc, time(), date("d.m.y"), $_SESSION['name'], $_FILES['userfile']['name'][1]); //insert in DB
        $insert->affectedRows();

        for ($key = 0; $key < $total_files; $key++) {

            // Check if file is selected
            if (isset($_FILES['userfile']['name'][$key]) && $_FILES['userfile']['size'][$key] > 0) {
                $original_filename = $_FILES['userfile']['name'][$key];
                $target = $target_dir . basename($original_filename);
                $tmp  = $_FILES['userfile']['tmp_name'][$key];
                move_uploaded_file($tmp, $target);
                header("Location: /");
            } else {
                header("Location: error_page");
            }
        }
    }
}


require ROOT_DIR . '/inc/footer.php';
