<?php
require_once ROOT_DIR . '/inc/header.php';
require_once ROOT_DIR . '/inc/connect.php';
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: error_page");
}

$author = $_GET['author'];

$sel = $db->query('SELECT * FROM comments WHERE id = ?', $id)->fetchArray();

if ($_SESSION['auth'] and $_SESSION['name'] == $author or $_SESSION['status'] == 1) {
?>

    <body class="text-center">

        <main class="form-signin">
            <form action="/feedback_comm_edit?id=<?= $id; ?>" method="post">

                <h1 class="h3 mb-3 fw-normal">Редактирование комментария</h1>

                <div class="form-floating">
                    <textarea class="form-control" rows="3" placeholder="А что вы об этом думаете?" name="message" maxlength="500" required><?= $sel['message']; ?></textarea>
                    <label for="floatingInput">Текст комментария</label>
                </div>
                <hr>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Изменить</button>
            </form>
        </main>

    <?php
} else {
    header("Location: error_page");
}
require_once ROOT_DIR . '/inc/footer.php'; ?>