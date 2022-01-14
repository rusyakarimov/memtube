<?php
require_once __DIR__ . '/../inc/config.php';
$title = "MEM-TUBE - Скачайте и пользуйтесь!";
require_once __DIR__ . '/../inc/header.php';
?>

<div class="content">
    <?php require_once __DIR__ . '/../inc/sidebar.php'; ?>

    <main class="content__main">
        <h2 class="content__main-heading"><?= $title ?></h2>

        <form class="search-form" action="index.php" method="post" autocomplete="off">
            <input class="search-form__input" type="text" name="" value="" placeholder="Поиск мемов">

            <input class="search-form__submit" type="submit" name="" value="Искать">
        </form>

    </main>

</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>