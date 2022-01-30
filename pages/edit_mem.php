<?php
$title = "MEM-TUBE: Редактирование мема";
require_once ROOT_DIR . '/inc/header.php';
require_once ROOT_DIR . '/inc/connect.php';
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: error_page");
}
$sel = $db->query('SELECT * FROM files WHERE id = ?', $id)->fetchArray();
if ($_SESSION['status'] !== 1) {
    header("Location: error_page");
} else {
?>

    <body class="text-center">

        <main class="form-signin">
            <form action="/feedback_mem_edit?id=<?= $id; ?>" method="post">

                <h1 class="h3 mb-3 fw-normal">Редактирование</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="name" value="<?= $sel['name']; ?>" placeholder="Название" maxlength="100" required>
                    <label for="floatingInput">Название</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingPassword" name="desc" value="<?= $sel['desc']; ?>" placeholder="Password" maxlength="300" required>
                    <label for="floatingPassword">Описание</label>
                </div>
                <hr>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Изменить</button>
            </form>
        </main>
    <?php
}
require_once ROOT_DIR . '/inc/footer.php'; ?>