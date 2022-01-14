<?php
require_once __DIR__ . '/../inc/config.php';
$title = "Новая категория";
require_once __DIR__ . '/../inc/header.php';
?>
<div class="content">

    <?php require_once __DIR__ . '/../inc/sidebar.php'; ?>
    <main class="content__main">
        <? if ($_SESSION['status'] == '1') : //if admin 
        ?>



            <h2 class="content__main-heading"><?= $title ?></h2>

            <form class="form" action="/feedback_cat" method="post" autocomplete="off">
                <div class="form__row">
                    <label class="form__label" for="name">Название(100) <sup>*</sup></label>
                    <input class="form__input" type="text" name="name" id="name" value="" maxlength="100" required placeholder="Введите название категории">
                </div>
                <div class="form__row">
                    <label class="form__label" for="desc">Описание(300) <sup>*</sup></label>
                    <input class="form__input" type="text" name="desc" id="desc" value="" maxlength="300" required placeholder="Введите описание категории">
                </div>

                <div class="form__row form__row--controls">
                    <input class="button" type="submit" name="" value="Добавить">
                </div>
            </form>

        <?php

        else :
            header("Location: error_page");
        endif;

        ?>


    </main>
</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>