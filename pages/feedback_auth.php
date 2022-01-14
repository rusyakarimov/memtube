<?php
require_once __DIR__ . '/../inc/config.php';
$title = "Авторизация-ответ";
require_once __DIR__ . '/../inc/header.php';
?>
<div class="content">
    <?php require_once __DIR__ . '/../inc/sidebar.php'; ?>

    <main class="content__main">

        <h2 class="content__main-heading"><?= $title ?></h2>

        <?php
        $login = $_POST['name'];
        $pass = md5($_POST['password']);

        $account = $db->query('SELECT * FROM users WHERE username = ? AND password = ?',  $login, $pass)->fetchArray();

        if ($account['user_id'] == 1) {
            $_SESSION['status'] = 1;
        } else {
            $_SESSION['status'] = 2;
        }

        if ($account) {
            $_SESSION['auth'] = true; // пометка об авторизации
            $_SESSION['name'] = $login; //Имя юзера
            $error->show_success($_POST['name'] . ' , Вы успешно Авторизованы!');
            header("Location: /");
        } else {
            $error->show_error('Пользователь с таким логином или паролем не существует!');
            header("Location: error_page");
        }
        ?>

    </main>
</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>