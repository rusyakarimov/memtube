<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "Страницы не существует!";
require_once ROOT_DIR . '/inc/header.php'; ?>

<div class="content">
    <?php require_once ROOT_DIR . '/inc/sidebar.php'; ?>

    <main class="content__main">
        <h2 class="content__main-heading"><?= $title ?></h2>

        <p class="error-message">Извините, запрашиваемой страницы не существует!</p>

    </main>
</div>

<?php require_once ROOT_DIR . '/inc/footer.php'; ?>