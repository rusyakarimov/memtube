<?php
require_once __DIR__ . '/../inc/config.php';
$title = "MEM-TUBE - Выход из аккаунта";
require_once __DIR__ . '/../inc/header.php'; ?>

<div class="content">
    <?php //require_once __DIR__ . '/../inc/sidebar.php'; 
    ?>

    <main class="content__main">
        <?=
        session_unset();
        session_destroy();
        header("Location: /"); ?>
    </main>

</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>