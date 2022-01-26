<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "MEM-TUBE - Скачайте и пользуйтесь!";
require_once ROOT_DIR . '/inc/header.php';
?>
<div class="text-center">
    <h1 class="h3 mb-3 fw-normal"></h1>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Произошла ошибка!</h4>
        <p>Произошла ошибка, возможно вы неверно ввели адрес в адресную строку.</p>
        <hr>
        <p class="mb-0">Так-же проверьте данные, которые вы ввели в форму, возможно, что вы ошиблись с вводом.</p>
    </div>
</div>

<?php require_once ROOT_DIR . '/inc/footer.php'; ?>