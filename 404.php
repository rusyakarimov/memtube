<?php
require_once __DIR__ . '/inc/config.php';
$title = "Страницы не существует!";
require_once __DIR__ . '/inc/header.php'; ?>

<div class="content">
    <?php require_once __DIR__ . '/inc/sidebar.php'; ?>

    <main class="content__main">
        <h2 class="content__main-heading"><?= $title ?></h2>

        <p class="error-message">Извините, запрашиваемой страницы не существует!</p>

    </main>
</div>

<?php require_once __DIR__ . '/inc/footer.php'; ?>