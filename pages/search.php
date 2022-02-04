<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "MEM-TUBE: Поиск";
require_once ROOT_DIR . '/inc/header.php';
require_once ROOT_DIR . '/inc/connect.php';
?>
<?php
if ($_SESSION['auth']) :

    if (!empty($_POST['quer'])) {
        $query = '*' . $_POST['quer'] . '*';
    } else {
        header("Location: error_page");
    }

    $qf = $db->query('SELECT * FROM files WHERE MATCH (`name`,`desc`) AGAINST (? IN BOOLEAN MODE)', $query)->fetchAll();
    $count = $db->query('SELECT * FROM files WHERE MATCH (`name`,`desc`) AGAINST (? IN BOOLEAN MODE)', $query)->numRows();
?>

    <body class="text-center">
        <main>
            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light"><?php
                                                if ($count <= 0) : ?>
                                Ничего не найдено
                            <?php else :
                            ?>
                                Результаты поиска
                            <?php endif; ?>
                        </h1>
                    </div>
                </div>
            </section>

            <ul class="list-group">
                <?php foreach ($qf as $row) :
                ?>
                    <li class="list-group-item">
                        <b><a href="/view?id=<?= $row['id']; ?>"><?= $row['name']; ?></a></b>
                    </li>

                <?php endforeach; ?>
            </ul>

        </main>
    </body>
    <?php //endif; 
    ?>
<?php else :
    header("Location: guest"); ?>
<?php endif; ?>
<?php require_once ROOT_DIR . '/inc/footer.php'; ?>