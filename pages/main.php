<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "MEM-TUBE - Скачайте и пользуйтесь!";
require_once ROOT_DIR . '/inc/header.php';
?>

<div class="content">
    <?php require_once ROOT_DIR . '/inc/sidebar.php'; ?>

    <main class="content__main">
        <h2 class="content__main-heading"><?= $title ?></h2>

        <form class="search-form" action="index.php" method="post" autocomplete="off">
            <input class="search-form__input" type="text" name="" value="" placeholder="Поиск мемов">

            <input class="search-form__submit" type="submit" name="" value="Искать">
        </form>
        <?php
        $sel = $db->query('SELECT *
                                FROM files
                                ORDER BY `id` DESC
                                LIMIT 10')->fetchAll();
        foreach ($sel as $item) :
        ?>
            <div class="mem-list">
                <h2><?= $item['name'] ?></h2>
                <video width="200" heigth="100" controls="controls">
                    <source src='<?= "./loads/" . $item['file'] ?>' type='video/mp4' />
                </video>
                <p class="author"><?= $item['user'] ?> / <?= $item['date']  ?></p>
                <p><?= $item['desc'] ?></p>
            </div>
        <?php endforeach; ?>
    </main>

</div>

<?php require_once ROOT_DIR . '/inc/footer.php'; ?>