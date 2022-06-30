<?php include"../../path.php";
include "../../app/controllers/users.php";?>

<!doctype html>
<html lang="en">
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
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alatsi&family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<?php include("../../app/include/header-admin.php") ?>
<!--Header end-->
<?php include "../../app/include/sidebar-admin.php"?>

<div class="posts col-9">
    <div class="button row">
        <a href="create.php" class="col-2 btn btn-success">Создать</a>
        <span class="col-1"></span>
        <a href="index.php" class="col-3 btn btn-warning">Управление</a>
    </div>
    <div class="row title-table">
        <h2>Редактирование пользователя</h2>
    </div>
    <div class="row add-post">
        <div class="mb-12 col-12 col-md-12 errMsg">
            <?php include "../../app/helps/errors.php" ?>
        </div>
        <form action="edit.php" method="post">
            <input name="id" value="<?=$id?>"  type="hidden">
            <div class="col">
                <label for="formGroupExampleInput"  class="form-label">Логин</label>
                <input name="login"  type="text" value="<?=$login;?>" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш логин">

            </div>
            <div class="w-100"></div>
            <div class="col">
                <label for="exampleInputEmail1"  class="form-label">Email </label>
                <input name="email"  value="<?=$email;?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваш email" >
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <label for="exampleInputPassword1" class="form-label">Cбросить пароль</label>
                <input type="password" name="pass-first" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль">
            </div>
            <div class="w-100"></div>
            <div class="col">
                <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
                <input type="password" name="pass-second" class="form-control" id="exampleInputPassword2" placeholder="Повторите ваш пароль" >
            </div>
            <div class="col col-6">
                <input type="checkbox" name="admin" >
                <label>Admin</label>
            </div>  
            <div class="col">
                <button name="update_user" class="btn btn-primary" type="submit">Обновить</button>
            </div>
    </div>
    </form>
</div>
</div>
</div>
</div>

<!--Footer-->
<?php include("../../app/include/footer.php")?>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>