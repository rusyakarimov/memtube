<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="<?= KEYWORDS ?>" /><!-- Ключевые слова -->
    <meta name="description" content="<?= DESCRIPTION ?>" /><!-- Описание сайта -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title><!-- Заголовок -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/signin.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/main" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="../img/logo.png" alt="Логотип MEM-TUBE">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/info" class="nav-link px-2 text-white">О сервисе</a></li>
                    <li><a href="/faq" class="nav-link px-2 text-white">FAQs</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="/search" method="POST">
                    <input type="search" class="form-control form-control-dark" placeholder="Найти..." aria-label="Search" name="quer">
                </form>
                <?php if ($_SESSION['auth']) : ?>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../user_pic/<?= $_SESSION['pic']; ?>" alt="" width="32" height="32" class="rounded-circle me-2">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="/profile"><strong><?= $_SESSION['name']; ?></strong></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/addmem">Новый мем</a></li>
                            <?php if ($_SESSION['status'] == 1) : ?>
                                <li><a class="dropdown-item" href="/newcat">Новая категория</a></li>
                            <?php endif; ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Выйти</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <div class="text-end">
                        <a href="/auth">
                            <button type="button" class="btn btn-outline-light me-2">Вход</button>
                        </a>
                        <a href="/reg">
                            <button type="button" class="btn btn-warning">Регистрация</button>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>