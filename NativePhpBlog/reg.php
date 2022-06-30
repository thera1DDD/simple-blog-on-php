<?php include("path.php")?>
<?php include ("app/controllers/users.php")?>

<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>My blog!</title>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/251cfd4d1c.js" crossorigin="anonymous"></script>
    <!--Custom css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alatsi&family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<?php include("app/include/header.php") ?>
<!--Form-->
<div class="container reg_form">
    <form class="row justify-content-center" method="post" action="reg.php">
        <h2>Регистрация</h2>
        <div class="mb-3 col-12 col-md-4 err">
            <p><?=$errMessage?></p>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput"  class="form-label">Ваш Логин</label>
            <input name="login" type="text" value="" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш логин">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputEmail1"  class="form-label">Email </label>
            <input name="email"  value="" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваш email" >
            <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="pass-first" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
            <input type="password" name="pass-second" class="form-control" id="exampleInputPassword2" placeholder="Повторите ваш пароль" >
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <button type="submit"  name="button-reg" class="btn btn-primary">Регистрация</button>
            <a href="aut.html">Авторизоваться</a>
        </div>
    </form>
</div>
<?php include("app/include/footer.php")?>


