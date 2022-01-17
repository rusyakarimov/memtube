<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "Авторизация";
require_once ROOT_DIR . '/inc/header.php';

if (empty($_SESSION['name'])) : //if !auth
?>

    <div class="content">
        <?php require_once ROOT_DIR . '/inc/sidebar.php'; ?>

        <main class="content__main">

            <h2 class="content__main-heading"><?= $title ?></h2>

            <form class="form" action="/feedback_auth" method="post" autocomplete="off">

                <div class="form__row">
                    <label class="form__label" for="name"><b>Логин</b> <sup>*</sup></label>

                    <input class="form__input" type="text" name="name" id="name" value="" placeholder="Введите логин" maxlength="45" required>
                </div>

                <div class="form__row">
                    <label class="form__label" for="password"><b>Пароль</b> <sup>*</sup></label>

                    <input class="form__input" type="password" name="password" id="password" value="" placeholder="Введите пароль" maxlength="100" required>
                </div>

                <input class="button" type="submit" name="" value="Войти">
            </form>

        <?php
    else :
        header("Location: error_page");
    endif;
        ?>


        </main>
    </div>
    <?php require_once ROOT_DIR . '/inc/footer.php'; ?>