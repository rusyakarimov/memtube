<?php

$title = "Новый мем - ответ";

?>
<div class="content">
    <?php require_once ROOT_DIR . '/inc/sidebar.php'; ?>

    <main class="content__main">

        <h2 class="content__main-heading"><?= $title ?></h2>

        <?php
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $cat = $_POST['cat'];

        $file = $_FILES['file']['name'];
        $uploaddir = ROOT_DIR . '/loads/';
        $uploadfile = $uploaddir . basename($file);
        $type = $_FILES['file']['type'];

        $num_rows = $db->query('SELECT * FROM files WHERE name = ?', $name)->numRows();

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

            $insert = $db->query('INSERT INTO `files` (`id_cat`,`file`,`name`, `desc`,`time`,`date`,`user`)
                 VALUES (?,?,?,?,?,?,?)', $cat, $file, $name, $desc, time(), date("d.m.y"), $_SESSION['name']); //insert in DB
            $insert->affectedRows();

            if ($insert) {

                if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                    $error->show_success("Файл <b>" . $file . "</b> корректен и был успешно загружен.");
                } else {
                    $error->show_error('Ошибка загрузки файла!');
                }
            } else {
                $error->show_error("Возможно это файловая атака!");
            }
        }
        ?>


    </main>
</div>

<?php require ROOT_DIR . '/inc/footer.php'; ?>