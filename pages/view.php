<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "Просмотр мема";
require_once ROOT_DIR . '/inc/header.php';
?>
<div class="content">

    <?php require_once ROOT_DIR . '/inc/sidebar.php'; ?>

    <main class="content__main">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $error->show_error('ID не установлено!');
        }

        $count = $db->query('SELECT *
                             FROM files
                             WHERE id = ?', $id)->numRows();

        if ($count <= 0) {
            $error->show_error('Данной записи не существует!');
        }

        $sel = $db->query('SELECT *
                                FROM files
                                WHERE id = ?', $id)->fetchAll();
        ?>
        <?php foreach ($sel as $item) : ?>
            <div class="content__main-col">
                <header class="content__header">
                    <h2 class="content__header-text"><?= $item['name']; ?></h2>
                </header>
                <div class="gif gif--large">
                    <div class="gif__picture">
                        <video controls="controls">
                            <source src="./loads/<?= $item['file']; ?>" alt="">
                        </video>
                    </div>

                    <div class="gif__desctiption">
                        <div class="gif__description-data">
                            <?php $size = filesize("./loads/" . $item['file']);
                            $size = round($size / 1024 / 1024, 2) ?>
                            <span class="gif__username">Добавил: <?= $item['user']; ?></span>
                            <span class="gif__views"><a href="./loads/<?= $item['file'] ?>" download>Скачать</a>(<?= $size; ?> Мб)</span>
                            <span class="gif__likes">Добавлено: <?= $item['date']; ?></span>
                        </div>
                        <div class="gif__description">
                            <p><?= $item['desc']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php $error->show_success('Для просмотра на полном экране кликните на видео дважды!'); ?>
                </div>
            </div>

    </main>
</div>


<?php require_once ROOT_DIR . '/inc/footer.php'; ?>