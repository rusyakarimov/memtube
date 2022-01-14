<?php
$title = "Новая категория - ответ";

?>
<div class="content">
    <?php require __DIR__ . '/../inc/sidebar.php'; ?>

    <main class="content__main">

        <h2 class="content__main-heading"><?= $title ?></h2>
        <?php
        $name = $_POST['name'];
        $desc = $_POST['desc'];

        $num_rows = $db->query('SELECT * FROM category WHERE name = ?', $name)->numRows();
        if (!$num_rows) {
            $insert = $db->query('INSERT INTO `category` (`name`,`desc`) VALUES (?,?)', $name, $desc); //insert in DB
            $insert->affectedRows();
        } else {
            $error->show_error('Категория с таким именем уже существует!');
        ?>
            <a class="welcome__button button" href="<?= $_SERVER['HTTP_REFERER'] ?>">Назад</a>
        <?php
        }
        if ($insert) {
            $error->show_success('Категория <b>' . $name . '</b> успешно добавлена!');
        ?>
            <a class="welcome__button button" href="<?= $_SERVER['HTTP_REFERER'] ?>">Назад</a>
        <?php
        } else {

            $error->show_error('ОШИБКА ПРИ ОТПРАВКЕ!');
            header("Location: error_page");
        }
        ?>

    </main>
</div>

<?php require __DIR__ . '/../inc/footer.php'; ?>