<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "MEM-TUBE - Выход из аккаунта";
require_once ROOT_DIR . '/inc/header.php'; ?>

<div class="content">
    <main class="content__main">
        <?=
        session_unset();
        session_destroy();
        header("Location: /"); ?>
    </main>

</div>

<?php require_once ROOT_DIR . '/inc/footer.php'; ?>