<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "MEM-TUBE - Скачайте и пользуйтесь!";
require_once ROOT_DIR . '/inc/header.php';
require_once ROOT_DIR . '/inc/connect.php';

// Текущая страница
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$kol = 3;  // количество записей для вывода
$art = ($page * $kol) - $kol;
// Определяем все количество записей в таблице
$total = $db->query('SELECT * FROM files')->numRows();
// Количество страниц для пагинации
$str_pag = ceil($total / $kol);
//Запрос у базе
$sel = $db->query('SELECT * FROM files ORDER BY id DESC LIMIT ?,?', $art, $kol)->fetchAll();
?>

<?php
if ($total <= 0) :
?>
    <div class="modal modal-sheet position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSheet">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-6 shadow">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title">Записи отсутствуют</h5>

                </div>
                <div class="modal-body py-0">
                    <p>К сожалению, пока никто не добавил мем :( Будьте первым!</p>
                </div>
                <div class="modal-footer flex-column border-top-0">
                    <a href="/addmem">
                        <button type="button" class="btn btn-lg btn-primary w-100 mx-0 mb-2">Добавить мем</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
else :
?>
    <main>
        <!--
            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">MEM-TUBE</h1>
                    </div>
                </div>
            </section>
            -->
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($sel as $item) :
                        $cat = $db->query('SELECT * FROM category WHERE `id` = ?', $item['id_cat'])->fetchArray();
                    ?>
                        <div class="col">
                            <div class="card text-dark bg-light mb-3">
                                <a href="/view?id=<?= $item['id']; ?>">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="./loads/<?= $item['pic']; ?>">

                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $item['name']; ?></h5>
                                    <a href="cat?id=<?= $cat['id']; ?>" class="btn btn-primary">
                                        <?= $cat['name']; ?>
                                    </a>
                                    <p class="card-text"><?= $item['desc']; ?></p>

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="btn-group">
                                            <a href="/view?id=<?= $item['id']; ?>">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Смотреть</button>
                                            </a>
                                            <?php if ($_SESSION['status'] == 1) : ?>
                                                <a href="/edit_mem?id=<?= $item['id']; ?>">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">Ред.</button>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal">Удалить</button>

                                                <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Осторожно!</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="mb-5">Вы действительно хотите удалить данную запись?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="/del_file?id=<?= $item['id']; ?>">
                                                                    <button type="button" class="btn btn-primary">Да, хочу</button>
                                                                </a>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <small class="text-muted">Дата: <?= $item['date']; ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <!-- Pagination -->
        <nav aria-label="Pagination">
            <hr class="my-0" />
            <ul class="pagination justify-content-center my-4">
                <?php
                for ($i = 1; $i <= $str_pag; $i++) : ?>
                    <?php
                    if ($page == $i) : ?>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php else : ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php
                    endif;
                    ?>
                <?php endfor; ?>
            </ul>
        </nav>

    </main>
<?php endif; ?>

<?php require_once ROOT_DIR . '/inc/footer.php'; ?>