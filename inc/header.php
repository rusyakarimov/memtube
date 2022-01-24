<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="<?= KEYWORDS ?>" /><!-- Ключевые слова -->
    <meta name="description" content="<?= DESCRIPTION ?>" /><!-- Описание сайта -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title><!-- Заголовок -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">


</head>

<body>


    <div class="page-wrapper">
        <div class="container container--with-sidebar">
            <header class="main-header">
                <a href="/">
                    <img src="../img/logo.png" width="200" height="100" alt="Логотип MEM-TUBE">
                </a>

                <div class="main-header__side">
                    <div class="main-header__side-item user-menu">
                        <div class="user-menu__data">

                            <?php if (!empty($_SESSION['name'])) :
                            ?>
                                <p>Привет, <b><?= $_SESSION['name'] ?> !</b></p>
                                <a href="/logout">Выйти</a>
                            <?php
                            else :
                            ?>
                                <a class="button button--transparent content__side-button" href="/auth">Вход</a>
                                <a class="button button--transparent content__side-button" href="/reg">Регистрация</a>
                            <?php
                            endif;
                            ?>


                        </div>
                    </div>
                </div>
            </header>