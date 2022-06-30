<?php include"../../path.php";
include "../../app/controllers/posts.php";?>



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
     <div class="row title-table">
        <h2>Редактирование записи</h2>
    </div>
    <div class="row add-post">
        <div class="mb-12 col-12 col-md-12 err">
            <!--Вывод ошибок-->
            <?php include "../../app/helps/errors.php" ?>
        </div>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <input value="<?=$id;?>" type="hidden" name="id">
            <div class="col mb-4">
                <input value="<?=$title?>" name="title" type="text" class="form-control" placeholder="Title" aria-label="Название статьи">
            </div>
            <div class="col">
                <label for="editor" class="form-label">Содержимое записи</label>
                <textarea name="content" id="editor" class="form-control"  rows="6"><?=$content?></textarea>
                <label for="editor" class="form-label">Фото записи</label>
                <div class="img col-12 col-md-4">
                    <img src="<?=BASE_URL . 'assets/img/posts/'. $post['img']; ?>" class="img-thumbnail">
                </div>
                <div class="input-group col mb-4 mt-4">
                    <input name="img" type="file" class="form-control" id="inputGroupFile01" value="">
                </div>
                <select name="topic" class="form-select mb-2" aria-label="Default select example">
                    <?php foreach ($topics  as $key=> $topic): ?>
                        <option value="<?=$topic['id'];?>"> <?=$topic['name'];?></option>
                    <?php endforeach;?>
                </select>
                <div class="form-check"">
                <?php if(empty($publish)&& $publish=0):?>
                    <input type="checkbox" name="publish"  class="form-check-input"  id="flexCheckChecked" >
                    <label>Publish</label>
                <?php else:?>
                    <input type="checkbox" name="publish"  class="form-check-input"  id="flexCheckChecked" checked >
                    <label>Publish</label>
                <?php endif;?>
                </div>
                <div class="col col-6">
                    <button  class="btn btn-primary" name="edit_post" type="submit">Сохранить запись</button>
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
<!-- Добавления редактора-->
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
<script src="../../assets/js/script.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>