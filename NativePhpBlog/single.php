<?php include("path.php");include SITE_ROOT. "/app/database/db.php";

$postWithUsername = selectAllFromPostsWithUsersOnSingleById('posts','users',$_GET['post']);

?>

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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alatsi&family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<?php include("app/include/header.php") ?>

<!--Блок main-->
<div class="container">
    <div class="content row">
        <!--Main Content-->
        <div class="main-content col-md-9 col-12">
            <?php foreach ($postWithUsername as $postData) ?>
            <div class="single_post row">
                <h2><?= $postData['title'];?></h2>
                <div class="img col-12">
                    <img src="<?=BASE_URL . 'assets/img/posts/'. $postData['img']?>" alt="" class="img-thumbnail">
                    <div class="info">
                        <i class="far fa-user"><?=$postData['username'] ?></i>
                        <i class="far fa-calendar"><?=' '. $postData['created_data']?></i>
                    </div>
                </div>
                <div class="single_post_text col-12">
                    <?=$postData['content'];?>
                </div>
            </div>
            <!--Comments Content-->
            <?php include("app/include/comments.php")?>
        </div>
        <!--Sidebar Content-->
        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово...">
                </form>
            </div>
            <div class="section topics">
                <h3>Категория</h3>
                <ul>
                    <li><a href="">Программирование </a></li>
                    <li><a href="">Дизайн </a></li>
                    <li><a href="">Визуализация </a></li>
                    <li><a href="">Кейсы </a></li>
                    <li><a href="">Мотивация </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--Блок main end-->
<?php include("app/include/footer.php")?>





                                <!--Footer-end-->


                                <!-- Optional JavaScript; choose one of the two! -->

                                <!-- Option 1: Bootstrap Bundle with Popper -->
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

                                <!-- Option 2: Separate Popper and Bootstrap JS -->
                                <!--
                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
                                -->

       <body/>
<html/>