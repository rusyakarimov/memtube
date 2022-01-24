<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "MEM-TUBE - Скачайте и пользуйтесь!";
require_once ROOT_DIR . '/inc/header.php';
?>

<div class="content">

    <?php require_once ROOT_DIR . '/inc/sidebar.php'; ?>
    <?php if (!$_SESSION['name']) {
        header("Location: guest");
    } ?>

    <main class="content__main">
        <div class="gif-list">
            <h2 class="mem-list__main-heading"><?= $title ?></h2>
            <div class="gif-list">
                <form class="search-form" action="/search" method="post" autocomplete="off">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск мемов">
                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>
            </div>
        </div>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else $page = 1;

        $page = intval(@$_GET['page']);
        $page = (empty($page)) ? 1 : $page;
        $on_page = 50; //on_page memas
        $all_mems = $db->query('SELECT * FROM files')->numRows();
        $pages = ceil($all_mems / $on_page);
        $art = ($page * $on_page) - $on_page; // определяем, с какой записи нам выводить
        $sel = $db->query('SELECT *
                                FROM files
                                ORDER BY `id` DESC
                                LIMIT ?,?', $art, $on_page)->fetchAll();
        ?>

        <ul class="gif-list">
            <?php
            if ($all_mems <= 0) {
                $error->show_error('На данный момент записей не найдено!');
            } else {
                foreach ($sel as $item) : ?>
                    <li class="gif gif-list__item">
                        <div class="gif__picture">
                            <video controls="controls">
                                <source src='<?= "./loads/" . $item['file'] ?>' type='video/mp4' width="200" height="200" />
                            </video>
                        </div>
                        <div class="gif__desctiption">
                            <h3 class="gif__desctiption-title">
                                <a href=<?= "/view?id=" . $item['id'] ?>><?= $item['name'] ?></a>
                            </h3>

                            <div class="gif__description-data">
                                <span class="gif__username"><b><?= $item['user'] ?></b></span>
                                <span class="gif__likes"><b><?= $item['date'] ?></b></span>
                            </div>
                        </div>
                    </li>
                <?php endforeach;

                /*for ($i = 1; $i <= $pages; $i++) {
                echo "<a href=/?page=" . $i . "> [" . $i . "] </a>";
            }*/
                ?>
        </ul>
    <?php } ?>


    </main>

</div>


<?php require_once ROOT_DIR . '/inc/footer.php'; ?>