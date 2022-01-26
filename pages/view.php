<?php
require_once ROOT_DIR . '/inc/config.php';
$title = "Просмотр мема";
require_once ROOT_DIR . '/inc/header.php';
require_once ROOT_DIR . '/inc/connect.php';
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $error->show_error('ID не установлено!');
}

$count = $db->query('SELECT *
                             FROM files
                             WHERE id = ?', $id)->numRows();

if ($count <= 0) {
    $error->show_error('Данной записи не существует!');
}

$sel = $db->query('SELECT *
                                FROM files
                                WHERE id = ?', $id)->fetchAll();
?>
<?php foreach ($sel as $item) : ?>
    <?php $cat = $db->query('SELECT * FROM category WHERE `id` = ?', $item['id_cat'])->fetchArray(); ?>
    <?php $size = filesize("./loads/" . $item['file']);
    $size = round($size / 1024 / 1024, 2) ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1"><?= $item['name']; ?></h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Добавил <strong><?= $item['user'] ?> </strong>, <?= $item['date']; ?></div>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light" href="#"><?= $cat['name']; ?></a>
                    </header>

                    <div class="ratio ratio-16x9">
                        <iframe src="./loads/<?= $item['file']; ?>" title="YouTube video" allowfullscreen></iframe>
                    </div>
                    <a href="./loads/<?= $item['file'] ?>" download>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Скачать(<?= $size; ?> Мб)</button>
                    </a>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4"><?= $item['desc']; ?></p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                            <!-- Comment with nested comments-->
                            <div class="d-flex mb-4">
                                <!-- Single comment-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Категории</div>
                    <ul class="list-group">
                        <?php
                        $cats = $db->query('SELECT * FROM category')->fetchAll();
                        foreach ($cats as $cat) :
                            $numCats = $db->query('SELECT * 
                                          FROM files
                                          WHERE id_cat = ?', $cat['id'])->numRows();
                        ?>
                            <a href="cat?id=<?= $cat['id']; ?>">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= $cat['name']; ?>
                                    <span class="badge bg-primary rounded-pill"><?= $numCats; ?></span>
                                </li>
                            </a>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="card-header">Другие мемы</div>
                <?php $sel = $db->query('SELECT * FROM files ORDER BY id DESC LIMIT 3')->fetchAll();
                foreach ($sel as $mem) : ?>

                    <div class="card">
                        <a href="/view?id=<?= $mem['id']; ?>">
                            <img class="card-img-top" width="100%" height="225" src="./loads/<?= $item['pic']; ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $mem['name']; ?></h5>
                            <a href="/view?id=<?= $mem['id']; ?>" class="btn btn-primary">Смотреть</a>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        </div>
    </div>
    <?php require_once ROOT_DIR . '/inc/footer.php'; ?>