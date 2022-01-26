<?php
require_once ROOT_DIR . '/inc/connect.php';

$name = $_POST['name'];
$desc = $_POST['desc'];
$cat = $_POST['cat'];

// Set Upload Path
$target_dir = ROOT_DIR . '/loads/';

if (isset($_FILES['userfile']['name'])) {

    $total_files = count($_FILES['userfile']['name']);
    $insert = $db->query('INSERT INTO `files` (`id_cat`,`file`,`name`, `desc`,`time`,`date`,`user`,`pic`)
                VALUES (?,?,?,?,?,?,?,?)', $cat, $_FILES['userfile']['name'][0], $name, $desc, time(), date("d.m.y"), $_SESSION['name'], $_FILES['userfile']['name'][1]); //insert in DB
    $insert->affectedRows();

    for ($key = 0; $key < $total_files; $key++) {

        // Check if file is selected
        if (
            isset($_FILES['userfile']['name'][$key])
            && $_FILES['userfile']['size'][$key] > 0
        ) {

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

//$num_rows = $db->query('SELECT * FROM files WHERE name = ?', $name)->numRows();
/*
        if (file_exists($uploadfile)) {
            $error->show_error("Такой файл уже существует!");
            $err = 1;
            die();
        } else {
            $err = 0;
        }
        
        if ($type !== "video/mp4" && $type !== "video/3gp" && $type !== "video/avi") {
            $error->show_error("Недопустимое расширение файла!");
            $err = 1;
            die();
        } else {
            $err = 0;
        }


        if ($num_rows) {
            $error->show_error("Файл с таким именем уже существует!");
            $err = 1;
            die();
        } else {
            $err = 0;
        }

        if ($err == 0) {

            $insert = $db->query('INSERT INTO `files` (`id_cat`,`file`,`name`, `desc`,`time`,`date`,`user`,`pic`)
                 VALUES (?,?,?,?,?,?,?,?)', $cat, $file, $name, $desc, time(), date("d.m.y"), $_SESSION['name'], $file_pic); //insert in DB
            $insert->affectedRows();

            if ($insert) {

                if (move_uploaded_file($_FILES['userfile']['tmp_name'][0], $uploadfile)) {
                    $error->show_success("Файл <b>" . $uploadfile . "</b> был загружен.");
                }
                if (move_uploaded_file($_FILES['userfile']['tmp_name'][1], $uploadfile2)) {

                    $error->show_success("Файл <b>" . $uploadfile2 . "</b> был загружен.");
                }
            } else {
                $error->show_error("Ни один файл не был загружен!");
            }
        }
        */



require ROOT_DIR . '/inc/footer.php';
