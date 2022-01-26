<?php
$title = "MEM-TUBE: Новая категория";
require_once ROOT_DIR . '/inc/header.php';
?>
<?php
if (!$_SESSION['auth'] or $_SESSION['status'] != 1) {
    header("Location: error_page");
} else {
?>

    <body class="text-center">

        <main class="form-signin">
            <form action="/feedback_cat" method="post">

                <h1 class="h3 mb-3 fw-normal">Новая категория</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Введите логин" maxlength="100" required>
                    <label for="floatingInput">Название</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingPassword" name="desc" placeholder="Password" maxlength="300" required>
                    <label for="floatingPassword">Описание</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Добавить</button>
            </form>
        </main>
    <?php
}
require_once ROOT_DIR . '/inc/footer.php'; ?>