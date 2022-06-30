<?php
include "../../path.php";
include "../../app/controllers/users.php"?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>My blog!</title>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/251cfd4d1c.js" crossorigin="anonymous"></script>
    <!--Custom css-->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alatsi&family=Comfortaa:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
</head>
<body>
<?php include("../../app/include/header-admin.php") ?>
<!--Header end-->
<?php include "../../app/include/sidebar-admin.php" ?>
<div class="posts col-9">
    <div class="button row">
        <a href="create.php" class="col-2 btn btn-success">Создать</a>
        <span class="col-1"></span>
        <a href="index.php" class="col-3 btn btn-warning">Управление</a>
    </div>
    <div class="row title-table">
        <h2>Пользователи</h2>
        <div class="col-1">ID</div>
        <div class="col-2">Логин</div>
        <div class="col-3">Email</div>
        <div class="col-2">Роль</div>
        <div class="col-4">Управление</div>
    </div>
    <?php foreach ($users as $key=> $user):?>
    <div class="row post">
        <div class="col-1"><?=$user['id']?></div>
        <div class="col-2"><?=$user['username']?></div>
        <div class="col-3"><?=$user['email']?></div>
        <?php if($user['admin']):?>
            <div class="col-2">Admin</div>
        <?php else: ?>
            <div class="col-2">User</div>
        <?php endif;?>
        <div class="red col-2"><a class="redHref" href="edit.php?edit_id=<?=$user['id'];?>">edit</a></div>
        <div class="del col-2"><a class="delHref" href="index.php?delete_id=<?=$user['id'];?>">delete</a></div>
    </div>
    <?php endforeach?>
</div>
</div>
</div>

<!--Footer-->
<?php include("../../app/include/footer.php") ?>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>