<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= DESCRIPTION ?>">
  <meta name="keywords" content="<?= KEYWORDS ?>">
  <title>MEM-TUBE: Добро пожаловать!</title>
  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">

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
  <link href="/css/cover.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
      <div>
        <h3 class="float-md-start mb-0"><a href="/">
            <img class="mb-4" src="../img/logo.png" alt="" width="100" height="90">
          </a></h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link" href="/info">О сервисе</a>
          <a class="nav-link" href="/faq">FAQ</a>
        </nav>
      </div>
    </header>

    <main class="px-3">
      <h1>MEM-TUBE</h1>
      <p class="lead">Добро пожаловать на сервис обмена смешными мемами.</p>
      <p class="lead">Для начала работы необходимо войти или зарегистрироваться.</p>
      <p class="lead">
        <a href="/auth" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Вход</a>
      </p>
      <p class="lead">
        <a href="/reg" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Регистрация</a>
      </p>
    </main>

    <footer class="mt-auto text-white-50">
      <p>&copy; MEM-TUBE, 2022</p>
    </footer>
  </div>



</body>

</html>