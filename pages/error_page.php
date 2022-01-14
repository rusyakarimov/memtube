<?php
$title = "Произошла ошибка!";
?>

<div class="content">
    <?php require __DIR__ . '/../inc/sidebar.php';
    ?>

    <main class="content__main">
        <h2 class="content__main-heading"><?= $title ?></h2>


        <div class="content">
            <section class="welcome">
                <h2 class="welcome__heading">Вот, что может быть:</h2>

                <div class="welcome__text">
                    <p><b>Вы неверно ввели данные в какую-либо форму</b></p>
                    <p><b>Вы неверно ввели адрес в адресной строке</b></p>
                    <p><b>Произошла другая непредвиденная ошибка</b></p>
                </div>

                <a class="welcome__button button" href="/">На главную</a>
            </section>
        </div>

    </main>
</div>

<?php require __DIR__ . '/../inc/footer.php'; ?>