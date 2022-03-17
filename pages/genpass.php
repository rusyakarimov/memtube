<?php
require_once ROOT_DIR . '/inc/config.php';
$keywords = "mem-tube, скачать мемы, скачать видео, видео для монтажа";
$description = "Скачать мемы дя монтажа видео. Здесь можно использовать генератор пароля сервиса MEM-TUBE";
$title = "MEM-TUBE. Генератор паролей";
require_once ROOT_DIR . '/inc/header.php';
?>
<?php
switch ($_GET['act']) {
    default:
?>

        <body class="text-center">

            <main class="form-signin">

                <form class="form" action="?act=pass" method="POST">
                    <h1 class="h3 mb-3 fw-normal">Форма генератора</h1>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Тип генератора</label>
                        <select class="form-select" id="inputGroupSelect01" name="form">
                            <option value="1">Цифровой</option>
                            <option value="2">Буквенно-цифровой</option>
                            <option value="3">Буквенно-цифровой + спец.символы</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Количество символов</label>
                        <select class="form-select" id="inputGroupSelect01" name="num">
                            <option value="4">4</option>
                            <option value="8">8</option>
                            <option value="16">16</option>
                        </select>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Сгенерировать</button>
                </form>

        <?php
    case 'pass':
        $word = array('a', 'A', 'B', 'd', 'C', 'Z', 'Y', 'y', 'i', 'q', 'l', 'b', 'm', 'z', 's', 'g', 'o', 'p', 'u', 't', 'x', 'c');
        function form($value)
        {
            echo '<main class="form-signin">
            <form>
            <h1 class="h3 mb-3 fw-normal">Ваш пароль</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="name" value="' . $value . '" autofocus onfocus="this.select();">
                <label for="floatingInput">Логин</label>
            </div>
            <a href="/reg">
            <button class="w-100 btn btn-lg btn-primary" type="submit">Назад</button>
            </a>
            </form>
            </main>
            ';
        }
        if ($_POST['form'] == 1 and $_POST['num'] == 4) {
            form(rand(1111, 9999));
            break;
        }
        if ($_POST['form'] == 2 and $_POST['num'] == 4) {
            for ($i = 0; $i < 2; $i++) {
                $w = $word[rand(0, sizeof($word) - 1)];
                $cod[] = $w;
            }
            $cod = implode("", $cod);
            $ch = rand(11, 99);
            form($cod . $ch);
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
            form($cod . $sp . $ch);
        }

        if ($_POST['form'] == 1 and $_POST['num'] == 8) {
            form(rand(11111111, 99999999));
        }

        if ($_POST['form'] == 2 and $_POST['num'] == 8) {

            for ($i = 0; $i < 4; $i++) {
                $w = $word[rand(0, sizeof($word) - 1)];
                $cod[] = $w;
            }
            $cod = implode("", $cod);
            $ch = rand(1111, 9999);
            form($cod . $ch);
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
            form($cod . $sp . $ch);
        }


        if ($_POST['form'] == 1 and $_POST['num'] == 16) {
            form(rand(1111111111111111, 9999999999999999));
        }

        if ($_POST['form'] == 2 and $_POST['num'] == 16) {

            for ($i = 0; $i < 8; $i++) {
                $w = $word[rand(0, sizeof($word) - 1)];
                $cod[] = $w;
            }
            $cod = implode("", $cod);
            $ch = rand(11111111, 99999999);
            form($cod . $ch);
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
            form($cod . $sp . $ch);
        }


        break;
}
        ?>
            </main>
        </body>
        <? require_once ROOT_DIR . '/inc/footer.php'; ?>