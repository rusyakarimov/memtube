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
$count = $db->query('SELECT * FROM files WHERE user = ?', $_SESSION['name'])->numRows();
if (!$_SESSION['auth']) {
    header('Location: error_page');
} else {
?>

    <div class="nav-scroller bg-body shadow-sm">
        <nav class="nav nav-underline" aria-label="Secondary navigation">
            <a class="nav-link active" aria-current="page" href="/profile">Профиль</a>
            <a class="nav-link" href="/show_my">
                Мои мемы
                <span class="badge bg-light text-dark rounded-pill align-text-bottom"><?= $count; ?></span>
            </a>
        </nav>
    </div>
    <main class="container">
        <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
            <img class="me-3" src="../user_pic/<?= $_SESSION['pic']; ?>" alt="" width="48" height="48" class="rounded-circle me-2">
            <div class="lh-1">
                <h1 class="h6 mb-0 text-white lh-1"><strong><?= $_SESSION['name']; ?></strong></h1>
                <br>
                <small><?php if ($_SESSION['status'] == 2) {
                            echo 'Пользователь';
                        } else {
                            echo 'Администратор';
                        }
                        ?></small>
            </div>
        </div>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Профиль</h6>
            <div class="d-flex text-muted pt-3">
                <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" src="../img/pencil-square.svg" width="32" height="32">

                <p class="pb-3 mb-0 small lh-sm border-bottom">
                    <strong class="d-block text-gray-dark"><a href="/edit_profile?name=<?= $_SESSION['name']; ?>">Редактировать профиль</a></strong>
                    Здесь вы можете изменить основную информацию, а так-же изменить аватар.
                </p>
            </div>
            <div class="d-flex text-muted pt-3">
                <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" src="../img/person-x-fill.svg" width="32" height="32">

                <p class="pb-3 mb-0 small lh-sm border-bottom">
                    <strong class="d-block text-gray-dark">
                        <a data-bs-toggle="modal" data-bs-target="#modal" href="#">Удалить</a>
                    </strong>
                    Вы можете навсегда удалить ваш аккаунт.
                </p>
            </div>
        </div>
        <?php
        $modal = new Modal('Осторожно!', 'Вы действительно хотите удалить ваш аккаунт?', 'Confirm', 'modal', '/del_myself?name=' . $_SESSION['name']);
        ?>
    </main>
<?php
}
require_once ROOT_DIR . '/inc/footer.php'; ?>