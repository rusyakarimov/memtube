<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "MEM-TUBE: Добавить мем";
require_once ROOT_DIR . '/inc/header.php';
require_once ROOT_DIR . '/inc/connect.php';

$cats = $db->query('SELECT * FROM category ORDER BY `id` DESC')->fetchAll();

if (!$_SESSION['auth']) {
    header("Location: error_page");
}
?>

<body class="text-center">

    <main class="form-signin">
        <form enctype="multipart/form-data" action="/feedback_mem" method="POST">

            <h1 class="h3 mb-3 fw-normal">Добавить мем</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Введите логин" maxlength="200" required>
                <label for="floatingInput">Название</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPassword" name="desc" placeholder="Password" maxlength="500" required>
                <label for="floatingPassword">Описание</label>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Выберите категорию</label>
                <select class="form-select" id="inputGroupSelect01" name="cat">
                    <? foreach ($cats as $cat) : ?>
                        <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                    <? endforeach;  ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" /><!-- 10MB -->
                <input data-bs-toggle="tooltip" data-bs-placement="top" title="MP4 или GIF" type="file" class="form-control" id="inputGroupFile02" name="userfile[]">
                <label class=" input-group-text" for="inputGroupFile02">Мем</label>
            </div>
            <div class="input-group mb-3">
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" /><!-- 2MB -->
                <input data-bs-toggle="tooltip" data-bs-placement="top" title="JPG или PNG" type="file" class="form-control" id="inputGroupFile02" name="userfile[]">
                <label data-bs-toggle="tooltip" data-bs-placement="top" title="Превью для мема" class="input-group-text" for="inputGroupFile02">Превью</label>
            </div>
            <div class="alert alert-danger" role="alert">
                <p>Формат мема: <strong>mp4</strong> , <strong>gif, max 10MB</strong></p>
                <p>Превью - <strong>jpg</strong>, <strong>png, max 2MB</strong></p>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Добавить</button>
        </form>
    </main>

    <?php
    require_once ROOT_DIR . '/inc/footer.php'; ?>