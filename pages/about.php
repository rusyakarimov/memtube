<?php require_once ROOT_DIR . '/inc/header.php'; ?>

<div class="px-4 py-5 my-5 text-center">
    <a href="/"><img class="d-block mx-auto mb-4" src="../img/blackLogo.png" alt="" width="72" height="57"></a>
    <h1 class="display-5 fw-bold">MEM-TUBE</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Добро пожаловать на сервис обмена мемами! Здесь вы можете делиться своими мемами, комментировать чужие
            , а так-же скачивать их в один клик абсолютно бесплатно!
        </p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <?php if (!$_SESSION['auth']) : ?>
                <a href="/auth"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Войти</button></a>
                <a href="/reg"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Зарегистрироваться</button></a>
            <?php else : ?>
                <a href="/"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">На главную</button></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="bg-dark text-secondary px-4 py-5 text-center">
    <div class="py-5">
        <h1 class="display-5 fw-bold text-white">Присоединяйтесь скорее!</h1>
        <div class="col-lg-6 mx-auto">
            <p class="fs-5 mb-4">И начните делиться с миром вашими собственными мемами, или теми, которые вы нашли на просторах интернета! Мы ждём вас!</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <?php if (!$_SESSION['auth']) : ?>
                    <a href="/reg"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Зарегистрироваться</button></a>
                    <a href="/auth"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Войти</button></a>
                <?php else : ?>
                    <a href="/"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">На главную</button></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once ROOT_DIR . '/inc/footer.php'; ?>