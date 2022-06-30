<?php
include SITE_ROOT."/app/database/db.php";



$errMessage ='';
$id ='';
$name ='';
$description ='';
//Вывод категорий
$topicOut = selectAll('topics');

//Добаление категорий
if($_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['topic-create'])) {
    $nameTopic = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($nameTopic === '' || $description === '') {
        $errMessage = "Не все поля заполненны!";
    }elseif (mb_strlen($nameTopic, 'UTF-8') < 2) {
        $errMessage = "Категория не должна быть меньше 2х символов";
    }else{
        $existence = selectOne('topics', ['name' => $nameTopic]);
        if ($existence['name'] === $nameTopic) {
            $errMessage = "Такая категория уже есть";
        }else {
            $topic = [
                'name' => $nameTopic,
                'description' => $description
            ];
            $id = insert('topics', $topic);
            $topic_id = selectOne('topics', ['id' => $id]);
            header('location: ' . BASE_URL . 'admin/topics/index.php');

        }
    }
}else{
    $name ="";
    $description ="";
}


//Редактирование категории
if($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['id'])){
    $id =$_GET['id'];
    $topic = selectOne('topics',['id'=>$id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}


if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){
    $nameTopic = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($nameTopic === '' || $description === '') {
        $errMessage = "Не все поля заполненны!";
    }
    elseif (mb_strlen($nameTopic, 'UTF-8') < 2) {
        $errMessage = "Категория не должна быть меньше 2х символов";
    }
    else {
        $topic = [
            'name' => $nameTopic,
            'description' => $description
        ];
        $id = $_POST['id'];
        $topic_id = update('topics', $id, $topic);
        header("location:" . BASE_URL . "admin/topics/index.php");
    }
}

//Удаление категории
if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['del_id'])){
    $id =$_GET['del_id'];
    delete('topics',$id);
    header('location: ' . BASE_URL . 'admin/topics/index.php');
}
