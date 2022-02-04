<?php
require_once ROOT_DIR . '/inc/header.php';
require_once ROOT_DIR . '/inc/connect.php';

if (!empty($_GET['name'])) {
    $name = $_GET['name'];
} else {
    header("Location: error_page");
}

$sel = $db->query('SELECT * FROM users WHERE username = ?', $_SESSION['name'])->fetchArray();

if ($_SESSION['auth'] && $_SESSION['name'] == $name or $_SESSION['status'] == 1) {
?>

    <body class="text-center">

        <main class="form-signin">
            <form enctype="multipart/form-data" action="/feedback_edit_profile" method="post">

                <h1 class="h3 mb-3 fw-normal">Редактирование профиля</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="name" value="<?= $sel['username']; ?>" placeholder="Название" maxlength="45" required>
                    <label for="floatingInput">Логин</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingPassword" name="email" value="<?= $sel['email']; ?>" placeholder="Password" maxlength="45" required>
                    <label for="floatingPassword">E-MAIL</label>
                </div>
                <div class="input-group mb-3">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" /><!-- 2MB -->
                    <input data-bs-toggle="tooltip" data-bs-placement="top" title="JPG или PNG" type="file" class="form-control" id="inputGroupFile02" name="userfile" required>
                    <label data-bs-toggle="tooltip" data-bs-placement="top" title="Превью для мема" class="input-group-text" for="inputGroupFile02">Фото профиля</label>
                </div>
                <hr>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Изменить</button>
            </form>
        </main>

    <?php
} else {
    header('Location: error_page');
}
require_once ROOT_DIR . '/inc/footer.php'; ?>