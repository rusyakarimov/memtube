<?php
require_once __DIR__ . '/../inc/config.php';
$title = "Новый мем";
require_once __DIR__ . '/../inc/header.php';
?>
<div class="content">

    <?php require_once __DIR__ . '/../inc/sidebar.php'; ?>
    <main class="content__main">

        <? if ($_SESSION['auth']) : //if auth

            $cats = $db->query('SELECT * FROM category ORDER BY `id` DESC')->fetchAll();
        ?>



            <h2 class="content__main-heading"><?= $title ?></h2>

            <form class="form" enctype="multipart/form-data" action="/feedback_mem" method="POST" autocomplete="off">

                <div class="form__row">
                    <label class="form__label" for="name">Название(200) <sup>*</sup></label>
                    <input class="form__input" type="text" name="name" id="name" value="" maxlength="200" required placeholder="Введите название категории">
                </div>

                <div class="form__row">
                    <label class="form__label" for="desc">Описание(1000) <sup>*</sup></label>
                    <input class="form__input" type="text" name="desc" id="desc" value="" maxlength="1000" required placeholder="Введите описание категории">
                </div>

                <div class="form__row">
                    <label class="form__label" for="cat">Выберите категорию<sup>*</sup></label>
                    <div class="form__input">
                        <select id="cat" name="cat">
                            <? foreach ($cats as $cat) : ?>
                                <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                            <? endforeach;  ?>
                        </select>
                    </div>
                </div>

                <div class="form__row">
                    <label class="form__label" for="file">Файл<sup>*</sup></label>
                    <div class="form__input-file">
                        <input type="hidden" name="MAX_FILE_SIZE" value="20971520" />
                        <input class="visually-hidden" type="file" name="file" id="file" value="" required>
                        <label class="button button--transparent" for="file">
                            <span>ФАЙЛ (MAX 20MB)</span>
                        </label>
                    </div>
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