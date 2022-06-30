<?php include"../../path.php";
include "../../app/controllers/posts.php";
?>

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
            <div class="button row">
                <a href="create.php" class="col-2 btn btn-success">Добавить запись</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-warning">Управлять записями</a>
            </div>
            <div class="row title-table">
                <h2>Добавление записи</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 errMsg">
                    <?php include "../../app/helps/errors.php" ?>
                </div>
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="col mb-4">
                        <input value="<?=$title?>" name="title" type="text" class="form-control" placeholder="Title" aria-label="Название статьи">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Содержимое записи</label>
                        <textarea name="content" id="editor" class="form-control"  rows="6" ><?=$content?></textarea>
                        <div class="input-group col mb-4 mt-4">
                            <input name="img" type="file" class="form-control" id="inputGroupFile01">
                        </div>
                        <select name="topic" class="form-select mb-2" aria-label="Default select example">
                            <option selected>Категория поста</option>
                            <?php foreach ($topics  as $key => $topic): ?>
                                <option value="<?=$topic['id'];?>"><?=$topic['name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="col col-6">
                            <input type="checkbox" name="publish" value="1">
                            <label>Publish</label>
                        </div>
                        <div class="col col-6">
                            <button  class="btn btn-primary" name="add_post" type="submit">Добавить запись</button>
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