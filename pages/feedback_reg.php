<?php
require_once __DIR__ . '/../inc/config.php';
$title = "Регистрация-ответ";
require_once __DIR__ . '/../inc/header.php';
?>
<div class="content">
    <?php require_once __DIR__ . '/../inc/sidebar.php'; ?>

    <main class="content__main">

        <h2 class="content__main-heading"><?= $title ?></h2>

        <?php
        $login = $_POST['name'];
        $pass = md5($_POST['password']);
        $email = $_POST['email'];

        $account = $db->query('SELECT * FROM users WHERE username = ?', $login)->fetchArray(); //db query

        if ($account['username'] == $login or $account['email'] == $email) {
            header("Location: error_page");
        } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
            header("Location: error_page");
        } else {

            $insert = $db->query('INSERT INTO users (username,password,email) VALUES (?,?,?)', $login, $pass, $email); //insert in DB
            $insert->affectedRows();

            if ($insert) {

                $error->show_success($_POST['name'] . ' , Вы успешно зарегистрированы!</p>');
                $_SESSION['auth'] = true; // пометка об авторизации
                $_SESSION['name'] = $login; //
                header("Location: /");
            } else {

                $error->show_error('ОШИБКА ПРИ ОТПРАВКЕ!');
                header("Location: error_page");
            }
        }
        ?>

    </main>
</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>