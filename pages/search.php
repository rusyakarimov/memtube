<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "MEM-TUBE: Просмотр категории";
require_once ROOT_DIR . '/inc/header.php';
require_once ROOT_DIR . '/inc/connect.php';
?>
<?php
if ($_SESSION['auth']) :
    /*
    if (isset($_GET['go'])) {
        if (preg_match("^/[A-Za-z]+/", $_POST['quer'])) {
            $query = '%' . $_POST['quer'] . '%';
        }
    } else {
        header("Location: error_page");
    }
    */
    $query = $POST['quer'];
    $qf = $db->query('SELECT * FROM files WHERE name = ?', $query);
    //$count = $db->query('SELECT * FROM files WHERE id_cat = ?', $id)->numRows();
    //$cat = $db->query('SELECT * FROM category WHERE `id` = ?', $id)->fetchArray();
?>
    <?php
    //if ($count <= 0) :
    ?>
    <?php
    // else :
    ?>
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Результаты поиска</h1>
                    <p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php while ($row = $qf->fetchArray()) :
                    ?>
                        <a href=""><?= $row['name']; ?></a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

    </main>
    <?php //endif; 
    ?>
<?php else :
    header("Location: guest"); ?>
<?php endif; ?>
<?php require_once ROOT_DIR . '/inc/footer.php'; ?>