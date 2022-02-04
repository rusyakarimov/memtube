<?php
$title = "MEM-TUBE: Профиль";
require_once ROOT_DIR . '/inc/config.php';
require_once ROOT_DIR . '/inc/header.php';
require_once ROOT_DIR . '/inc/connect.php';
?>
<style>
    @media (max-width: 991.98px) {
        .offcanvas-collapse {
            position: fixed;
            top: 56px;
            /* Height of navbar */
            bottom: 0;
            left: 100%;
            width: 100%;
            padding-right: 1rem;
            padding-left: 1rem;
            overflow-y: auto;
            visibility: hidden;
            background-color: #343a40;
            transition: transform .3s ease-in-out, visibility .3s ease-in-out;
        }

        .offcanvas-collapse.open {
            visibility: visible;
            transform: translateX(-100%);
        }
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        color: rgba(255, 255, 255, .75);
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .nav-underline .nav-link {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: .875rem;
        color: #6c757d;
    }

    .nav-underline .nav-link:hover {
        color: #007bff;
    }

    .nav-underline .active {
        font-weight: 500;
        color: #343a40;
    }

    .bg-purple {
        background-color: #6f42c1;
    }
</style>
<?php
if (!$_SESSION['auth']) {
    header('Location: error_page');
} else {
    $count = $db->query('SELECT * FROM files WHERE user = ?', $_SESSION['name'])->numRows();
    $sel = $db->query('SELECT * FROM files WHERE user = ?', $_SESSION['name'])->fetchAll();
?>
    <div class="nav-scroller bg-body shadow-sm">
        <nav class="nav nav-underline" aria-label="Secondary navigation">
            <a class="nav-link" aria-current="page" href="/profile">Профиль</a>
            <a class="nav-link active" href="/show_my">
                Мои мемы
                <span class="badge bg-light text-dark rounded-pill align-text-bottom"><?= $count; ?></span>
            </a>
        </nav>
    </div>
    <main class="container">
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    <?php
                    if ($count <= 0) :
                    ?>
                        <h1>ЗАПИСИ ОТСУТСТВУЮТ</h1>
                    <?php else : ?>
                        <?php
                        foreach ($sel as $item) :
                        ?>
                            <div class="col">
                                <div class="card text-dark bg-light mb-3">
                                    <a href="/view?id=<?= $item['id']; ?>">
                                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="./loads/<?= $item['pic']; ?>">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $item['name']; ?></h5>
                                        <p class="card-text"><?= $item['desc']; ?></p>

                                        <div class="d-flex justify-content-between align-items-center">

                                            <div class="btn-group">

                                                <button type="button" class="btn btn-sm btn-outline-secondary">Ред.</button>

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
                                                                <a href="#">
                                                                    <button type="button" class="btn btn-primary">Да, хочу</button>
                                                                </a>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <small class="text-muted">Дата: <?= $item['date']; ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </main>
<?php
}
require_once ROOT_DIR . '/inc/footer.php'; ?>