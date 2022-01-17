<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "Регистрация аккаунта";
require_once ROOT_DIR . '/inc/header.php';
?>
<div class="content">
    <? if (empty($_SESSION['name'])) : //if !auth 
    ?>

        <?php require_once ROOT_DIR . '/inc/sidebar.php'; ?>

        <main class="content__main">

            <h2 class="content__main-heading"><?= $title ?></h2>

            <form class="form" action="/feedback_reg" method="post" autocomplete="off">
                <div class="form__row">
                    <label class="form__label" for="email"><b>E-mail</b> <sup>*</sup></label>

                    <input class="form__input" type="email" name="email" id="email" value="" placeholder="Введите e-mail" maxlength="45" required>

                </div>

                <div class="form__row">
                    <label class="form__label" for="password"><b>Пароль</b> <sup>*</sup></label>

                    <input class="form__input" type="password" name="password" id="password" value="" placeholder="Введите пароль" maxlength="100" required>
                </div>

                <div class="form__row">
                    <label class="form__label" for="name"><b>Логин</b> <sup>*</sup></label>

                    <input class="form__input" type="text" name="name" id="name" value="" placeholder="Введите логин" maxlength="45" required>
                </div>

                <p><a href="/genpass">Генератор пароля</a></p>
                <input class="button" type="submit" name="" value="Зарегистрироваться">

            </form>

        <?php
    else :
        header("Location: error_page");
    endif;
        ?>
        </main>
</div>


<?php require_once ROOT_DIR . '/inc/footer.php'; ?>