<?php
include SITE_ROOT . "/app/database/db.php";
include "../../app/helps/checks.php";


$errMessage = [];
$id = '';
$title = '';
$content = '';
$img = '';
$topic = '';
$publish = '';

//Вывод категорий
$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'users');

//Add post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {
    //проверка картинки
    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\img\posts\\" . $imgName;
        if (strpos($fileType, 'image') === false) {
            array_push($errMessage, "Можно выбрать только изображение");
        }
        else{
            $result = move_uploaded_file($fileTmpName, $destination);
            if ($result) {
                $_POST['img'] = $imgName;
            } else {
                array_push($errMessage, "Ошибка загрузки изображения на сервер");
            }
        }
    } else {
        array_push($errMessage, "Ошибка получения изображения");
    }
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if ($title === '' || $content === '' || $topic === '') {
        array_push($errMessage, "Не все поля заполненны!");
    } elseif (mb_strlen($title, 'UTF-8') < 7) {
        array_push($errMessage, "Название статьи не должно быть меньше 7 символов");
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];

        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' => $id]);
        header('location: ' . BASE_URL . 'admin/posts/index.php');

    }
} else {
    $id = "";
    $title = "";
    $content = "";
    $publish = "";
    $topic = "";
}


//Вывод данных по id для редактирования
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];

}
//Обновление выведенных данных
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])) {
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = isset($_POST['publish']) ? 1 : 0;
    //проверка картинки
    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\img\posts\\" . $imgName;
        if (strpos($fileType, 'image') === false) {
            array_push($errMessage, "Можно выбрать только изображение");
        }
        else{
            $result = move_uploaded_file($fileTmpName, $destination);
            if ($result) {
                $_POST['img'] = $imgName;
            } else {
                array_push($errMessage, "Ошибка загрузки изображения на сервер");
            }
        }
    } else {
        array_push($errMessage, "Ошибка получения изображения");
    }
    if ($title === '' || $content === '' || $topic === '') {
        array_push($errMessage, "Не все поля заполненны!");
    } elseif (mb_strlen($title, 'UTF-8') < 7) {
        array_push($errMessage, "Название статьи не должно быть меньше 7 символов");
    } else {
        if(empty($_POST['img'])){
            $post = [
                'id_user' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'status' => $publish,
                'id_topic' => $topic
            ];
        }
        else{
            $post = [
                'id_user' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'status' => $publish,
                'img'=> $_POST['img'],
                'id_topic' => $topic
            ];
        }
        $post = update('posts',$id, $post);
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
}

else{
    $publish = isset($_POST['publish'])? 1 : 0;
}
//Удаление статьи
if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['delete_id'])){
    $id =$_GET['delete_id'];
    delete('posts',$id);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
}
//Публикация
if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['pub_id'])){
    $id =$_GET['pub_id'];
    $publish =$_GET['publish'];
    $posId = update('posts',$id,['status'=>$publish]);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
    die();
}




