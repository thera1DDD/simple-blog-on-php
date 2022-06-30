<?php
    include 'path.php';
    include "app/controllers/topics.php";
    $page = isset($_GET['page'])? $_GET['page']:1;
    $limit = 2;
    $offset = $limit*($page-1);
    $total_pages =  round(countRow('posts')/$limit,0);
    $posts = selectAllFromPostsWithUsersOnIndex('posts','users',$limit,$offset);
    $topTopics = selectTopTopicFromPostsOnindex('posts');



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


<!--Блок карусели-->

<div class="container">
    <div class="row">
        <h2 class="slider-title">Топ публикации</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">


        <div class="carousel-inner">
            <?php foreach ($topTopics as $key=>$post):?>
                <?php if($key==0):?>
                <div class="carousel-item active">
                <?php else:?>
                <div class="carousel-item">
                <?php endif;?>
                    <img src="<?=BASE_URL . 'assets/img/posts/' . $post['img']?>" alt="<?=$post['title']?>" class="d-block w-100">
                    <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                        <h5> <a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?> "><?php if(iconv_strlen($post['title']>120)):?><?=substr($post['title'],0,120)  . '...'?><?php else: ?> <?=$post['title']?> <?php endif;?></a></h5>
                        <p>Некоторый репрезентативный заполнитель для первого слайда.</p>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>
</div>
<!--Блок карусели end-->
<!--Блок main-->
<div class="container">
    <div class="content row">
        <!--Main Content-->
        <div class="main-content col-md-9 col-12">
            <h2>Последние публикации</h2>
            <?php foreach ($posts as  $post):?>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="<?=BASE_URL . 'assets/img/posts/' . $post['img']?>" alt="<?=$post['title']?>" class="img-fluid img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?> "><?php if(iconv_strlen($post['title']>120)):?><?=substr($post['title'],0,120)  . '...'?><?php else: ?> <?=$post['title']?> <?php endif;?></a>
                    </h3>

                    <i class="far fa-user"><?=' ' . $post['username']?></i>
                    <i class="far fa-calendar"><?= ' ' . $post['created_data']?> </i>
                    <p class="preview-text"><?php if(iconv_strlen($post['content'])>30):?><?=substr($post['content'],0,25)  . '...'?><?php else:?><?=$post['content']?> <?php endif;?> </p>
                </div>
            </div>
            <?php endforeach;?>
            <!--Pagination-->
            <?php include("app/include/pagination.php")?>
        </div>
        <!--Sidebar Content-->
        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="search.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово...">
                </form>
            </div>

            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <?php foreach ($topicOut as $key=> $topic): ?>
                    <li>
                        <a href="<?=BASE_URL . 'category.php?id=' .$topic['id'];?>"><?=$topic['name'];?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--Блок main end-->
    <!--Footer-->
<?php include("app/include/footer.php")?>
    <!--Footer end-->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- LikeBtnJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>