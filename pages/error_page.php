<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "MEM-TUBE - Скачайте и пользуйтесь!";
require_once ROOT_DIR . '/inc/header.php';
?>
<div class="modal modal-sheet position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSheet">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-6 shadow">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">Произошла ошибка!</h5>

            </div>
            <div class="modal-body py-0">
                <p><strong>Вот, что может быть:</strong></p>
                <ul>
                    <li>Был введен некорректный адрес</li>
                    <li>Неверно введены данные в какую-либо форму (<strong>логин, пароль и тд.</strong>)</li>
                    <li>Произошёл сбой при отправке какой-либо формы (<strong>например, недопустимое расширение файла</strong>)</li>
                    <li>Задан пустой поисковой запрос</li>
                    <li>Другая, непредвиденная ошибка</li>
                </ul>
            </div>
            <div class="modal-footer flex-column border-top-0">
                <a href="<?= $_SERVER['HTTP_REFERER']; ?>">
                    <button type="button" class="btn btn-lg btn-primary w-100 mx-0 mb-2">Назад</button>
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once ROOT_DIR . '/inc/footer.php'; ?>