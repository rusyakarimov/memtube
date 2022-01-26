<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="<?= KEYWORDS ?>" /><!-- Ключевые слова -->
    <meta name="description" content="<?= DESCRIPTION ?>" /><!-- Описание сайта -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация - "MEM-TUBE"</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="/feedback_reg" method="post">
            <a href="/">
                <img class="mb-4" src="../img/blackLogo.png" alt="" width="72" height="57">
            </a>
            <h1 class="h3 mb-3 fw-normal">Регистрация аккаунта</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Введите логин" maxlength="45" required>
                <label for="floatingInput">Логин</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Введите логин" maxlength="45" required>
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" maxlength="100" required>
                <label for="floatingPassword">Пароль</label>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <a href="/genpass">Генератор пароля</a>
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>

            <p class="mt-5 mb-3 text-muted">&copy; MEM-TUBE, 2022</p>
        </form>
    </main>

</body>

</html>