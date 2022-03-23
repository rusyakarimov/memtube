<?php
$keywords = KEYWORDS;
$description = "Скачать мемы дя монтажа видео. Вопросы и ответы о сервисе обмена мемами MEM-TUBE";
$title = "MEM-TUBE. вопросы и ответы о сервисе";
require_once ROOT_DIR . '/inc/header.php'; ?>

<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Вопросы и ответы</h1>
            </div>
        </div>
    </section>

    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    #1. Для чего нужен этот сервис?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Этот сервис должен помочь людям в распространении и популяризации различного рода мемов.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    #2. Какие возможности даёт регистрация на сервисе?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Пользоваться сервисом могут только зарегистрированные пользователи.</strong> После регистрации вы сможете добавлять и редактировать мемы, просматривать и скачивать мемы, а так-же комментировать их.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    #3. Есть ли платные услуги на сервисе?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Нет, на данный момент платных услуг нет и, скорее всего, не будет.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    #4. Какие ограничения на загрузку мемов?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul>
                        <li>Размер файла мема не более <strong>10МБ</strong>, для превью не более <strong>2МБ</strong></li>
                        <li>Формат для мема: <strong>.mp4</strong> или <strong>.gif</strong></li>
                        <li>Формат для превью: <strong>.jpg</strong> или <strong>.png</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once ROOT_DIR . '/inc/footer.php'; ?>