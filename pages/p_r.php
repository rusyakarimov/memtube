<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= DESCRIPTION ?>">
    <meta name="keywords" content="<?= KEYWORDS ?>">
    <title>Восстановление пароля - MEM-TUBE</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">


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


    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
</head>

<?php
if ($_SESSION['auth']) {
    header("Location: /");
}
?>

<body class="text-center">

    <main class="form-signin">

        <form action="/feedback_pr" method="post">
            <a href="/">
                <img class="mb-4" src="../img/blackLogo.png" alt="" width="72" height="57">
            </a>
            <h1 class="h3 mb-3 fw-normal">Восстановление пароля</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Введите EMAIL" maxlength="45" required>
                <label for="floatingInput">Введите E-MAIL</label>
            </div>
            <div class="alert alert-success" role="alert">
                <p>Не забудьте проверить <strong>почту!</strong></p>
                <p>Так-же письмо может попасть в папку <strong>спам!</strong></p>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <a href="/auth">
                        Назад
                    </a>
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Восстановить пароль</button>
            <p class="mt-5 mb-3 text-muted">&copy; MEM-TUBE, 2022</p>
        </form>
    </main>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>