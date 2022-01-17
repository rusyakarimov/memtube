<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "Генератор паролей";
require_once ROOT_DIR . '/inc/header.php';
?>

<div class="content">
    <?php require_once ROOT_DIR . '/inc/sidebar.php'; ?>

    <main class="content__main">

        <h2 class="content__main-heading"><?= $title ?></h2>
        <?php
        switch ($_GET['act']) {
            default:
        ?>

                <form class="form" action="?act=pass" method="POST">
                    <div class="form__row">
                        <label class="form__label" for="form"><b>Форма генератора</b></label>
                        <select class="form__input" name="form" id="form">
                            <option value="1">Цифровой</option>
                            <option value="2">Буквенно-цифровой</option>
                            <option value="3">Буквенно-цифровой + спец.символы</option>
                        </select>
                    </div>
                    <label class="form__label" for="symbol"><b>Количество символов</b></label>
                    <select class="form__input" name="num" id="num">
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="16">16</option>
                    </select>
                    <div class="form__row form__row--controls">
                        <input class="button" type="submit" value="Сохранить">
                    </div>
                </form>

        <?php
            case 'pass':
                $word = array('a', 'A', 'B', 'd', 'C', 'Z', 'Y', 'y', 'i', 'q', 'l', 'b', 'm', 'z', 's', 'g', 'o', 'p', 'u', 't', 'x', 'c');

                if ($_POST['form'] == 1 and $_POST['num'] == 4) {
                    echo '<label class="form__label" for="sum"><b>Ваш пароль</b></label>
                    <input class="form__input" id ="sum" value=' . rand(1111, 9999) . ' autofocus onfocus="this.select();">';
                    break;
                }
                if ($_POST['form'] == 2 and $_POST['num'] == 4) {
                    for ($i = 0; $i < 2; $i++) {
                        $w = $word[rand(0, sizeof($word) - 1)];
                        $cod[] = $w;
                    }
                    $cod = implode("", $cod);
                    $ch = rand(11, 99);
                    echo ' <label class="form__label" for="sum"><b>Ваш пароль</b></label>
                    <input class="form__input" value=' . $cod . $ch . ' autofocus onfocus="this.select();">';
                }

                if ($_POST['form'] == 1 and $_POST['num'] == 8) {
                    echo ' <label class="form__label" for="sum"><b>Ваш пароль</b></label>
                    <input class="form__input" value=' . rand(11111111, 99999999) . ' autofocus onfocus="this.select();">';
                }

                if ($_POST['form'] == 2 and $_POST['num'] == 8) {

                    for ($i = 0; $i < 4; $i++) {
                        $w = $word[rand(0, sizeof($word) - 1)];
                        $cod[] = $w;
                    }
                    $cod = implode("", $cod);
                    $ch = rand(1111, 9999);
                    echo ' <label class="form__label" for="sum"><b>Ваш пароль</b></label>
                    <input class="form__input" value=' . $cod . $ch . ' autofocus onfocus="this.select();">';
                }

                if ($_POST['form'] == 1 and $_POST['num'] == 16) {
                    echo ' <label class="form__label" for="sum"><b>Ваш пароль</b></label>
                    <input class="form__input" value=' . rand(1111111111111111, 9999999999999999) . ' autofocus onfocus="this.select();">';
                }

                if ($_POST['form'] == 2 and $_POST['num'] == 16) {

                    for ($i = 0; $i < 8; $i++) {
                        $w = $word[rand(0, sizeof($word) - 1)];
                        $cod[] = $w;
                    }
                    $cod = implode("", $cod);
                    $ch = rand(11111111, 99999999);
                    echo ' <label class="form__label" for="sum"><b>Ваш пароль</b></label>
                    <input class="form__input" value=' . $cod . $ch . ' autofocus onfocus="this.select();">';
                }


                if ($_POST['form'] == 3 and $_POST['num'] == 4) {

                    for ($i = 0; $i < 2; $i++) {
                        $w = $word[rand(0, sizeof($word) - 1)];
                        $cod[] = $w;
                    }
                    $cod = implode("", $cod);
                    $ch = rand(1, 9);
                    $spec = array('!', '?', '&', '_');
                    for ($i = 0; $i < 1; $i++) {
                        $s = $spec[rand(0, sizeof($spec) - 1)];
                        $sp[] = $s;
                    }
                    $sp = implode("", $sp);
                    echo ' <label class="form__label" for="sum"><b>Ваш пароль</b></label>
                    <input class="form__input" value=' . $cod . $sp . $ch . ' autofocus onfocus="this.select();">';
                }



                if ($_POST['form'] == 3 and $_POST['num'] == 8) {

                    for ($i = 0; $i < 4; $i++) {
                        $w = $word[rand(0, sizeof($word) - 1)];
                        $cod[] = $w;
                    }
                    $cod = implode("", $cod);
                    $ch = rand(11, 99);
                    $spec = array('!', '?', '&', '_');
                    for ($i = 0; $i < 2; $i++) {
                        $s = $spec[rand(0, sizeof($spec) - 1)];
                        $sp[] = $s;
                    }
                    $sp = implode("", $sp);
                    echo ' <label class="form__label" for="sum"><b>Ваш пароль</b></label>
                    <input class="form__input" value=' . $cod . $sp . $ch . ' autofocus onfocus="this.select();">';
                }



                if ($_POST['form'] == 3 and $_POST['num'] == 16) {

                    for ($i = 0; $i < 8; $i++) {
                        $w = $word[rand(0, sizeof($word) - 1)];
                        $cod[] = $w;
                    }
                    $cod = implode("", $cod);
                    $ch = rand(1111, 9999);
                    $spec = array('!', '?', '&', '_');
                    for ($i = 0; $i < 4; $i++) {
                        $s = $spec[rand(0, sizeof($spec) - 1)];
                        $sp[] = $s;
                    }
                    $sp = implode("", $sp);
                    echo ' <label class="form__label" for="sum"><b>Ваш пароль</b></label>
                    <input class="form__input" value=' . $cod . $sp . $ch . ' autofocus onfocus="this.select();">';
                }


                break;
        }
        ?>
    </main>
</div>
<? require_once ROOT_DIR . '/inc/footer.php'; ?>