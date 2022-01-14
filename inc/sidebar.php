<section class="content__side">

    <h2 class="content__side-heading">Категории</h2>
    <?php if (!empty($_SESSION['name'])) : ?>
        <a class="button button--transparent button--plus content__side-button" href="/addmem" target="project_add">Добавить мем</a>
    <?php endif;
    if (!empty($_SESSION) and $_SESSION['status'] == 1) : ?>
        <a class="button button--transparent button--plus content__side-button" href="/newcat" target="project_add">Добавить категорию</a>
    <? else :
        echo "";
    endif; ?>

    <nav class="main-navigation">
        <ul class="main-navigation__list">
            <?php
            $dbhost = 'localhost';
            $dbuser = 'rusya';
            $dbpass = 'rusya';
            $dbname = 'rusya';
            $db = new db($dbhost, $dbuser, $dbpass, $dbname) or die("ERROR");

            $error = new Messages();
            $cats = $db->query('SELECT * FROM category ORDER BY `id` DESC LIMIT 5')->fetchAll();

            foreach ($cats as $cat) : ?>
                <li class="main-navigation__list-item">
                    <a class="main-navigation__list-item-link" href="#"><?= $cat['name'] ?></a>
                    <span class="main-navigation__list-item-count">10</span>
                </li>

            <? endforeach;  ?>
        </ul>
    </nav>

</section>