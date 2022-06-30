<?php
session_start();
require('connect.php');


function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '<pre>';
    exit();
}
//Проверка выполнения запроса
    function dbCheckError($query)
    {
        $errInfo = $query->errorInfo();

        if ($errInfo[0] !== PDO::ERR_NONE) {
            echo $errInfo[2];
            exit();
        }
//Запись данных в таблицу
//

}

function insert($table, $params)
{
    global $pdo;
    $i =0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
        } else {
            $coll = $coll . ",$key";
            $mask = $mask . ",'" . "$value" . "'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table($coll) VALUES($mask)";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    return $pdo->lastInsertId();

}

function selectOne($table,$params=[]){
    global $pdo;
    $sql ="SELECT * FROM $table";
        $i=0;
        foreach ($params as $key=>$value){
            if(!is_numeric($value)){
                $value="'".$value. "'";
            }
            if($i===0){
                $sql=$sql. " WHERE $key=$value";
            }
            else{
                $sql=$sql . " AND $key=$value";
            }
            $i++;
        }

        $query = $pdo->prepare($sql);
        $query->execute();

        return $query->fetch();
    }
    $params =[
        'admin'=>1,
        'username'=>'Some'
    ];


function selectAll($table,$params=[])
{
    global $pdo;
    $sql = "select *from  $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            }
            else{
                $sql=$sql ." AND $key=$value";
            }
            $i++;
        }
    }
    $query =$pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

function update($table,$id,$params){
    global $pdo;
    $i =0;
    $str ='';
    foreach ($params as $key=> $value){
        if($i===0){
            $str= $str .$key. " = '". $value ."'";
        }
        else{
            $str=$str.", ". $key . "= '".$value ."'";
        }
        $i++;
    }
    $sql ="UPDATE $table SET $str WHERE id = $id ";
    $query=$pdo->prepare($sql);
    $query->execute($params);
}


function delete($table,$id){
    global $pdo;
    $sql ="DELETE FROM $table WHERE id =". $id;
    $query=$pdo->prepare($sql);
    $query->execute();
}
//Выборка записей (posts) с автором в админку
function selectAllFromPostsWithUsers($table1,$table2){
    global $pdo;
    $sql = "SELECT t1.id,t1.title, t1.img,t1.content,t1.status,t1.id_topic, t1.created_data,t2.username
        FROM  $table1 AS t1 JOIN  $table2 AS t2 WHERE t1.id_user =t2.id";
    $query =$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
//Выборка записей (posts) с автором на главную страницу
function selectAllFromPostsWithUsersOnIndex($table1,$table2,$limit,$offset){
    global $pdo;
    $sql = "SELECT p.*, u.username  FROM  $table1 AS p JOIN  $table2 AS u ON p.id_user =u.id WHERE p.status=1 LIMIT $limit OFFSET $offset";

    $query =$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function selectAllFromPostsWithUsersOnSingleById($table1, $table2,$postId){
    global $pdo;
    $sql ="SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u WHERE u.id = p.id_user AND p.id = $postId";
    $query =$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//Выборка записей (posts) для слайдшоу
function selectTopTopicFromPostsOnindex($table1){
    global $pdo;
    $sql = "SELECT * FROM $table1 WHERE id_topic=65 AND status=1";
    $query =$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//Поиск по заголовкам и содержимым
function searchInTitleAndContent($text,$table1,$table2){
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT p.*, u.username
    FROM  $table1 AS p JOIN  $table2 AS u ON p.id_user =u.id WHERE p.status=1
    AND p.title LIKE '%$text%' OR p.content LIKE '%$text%'";
    $query =$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
//Вывод постов по категориям
function selectPostsByTopic($idTopic,$table1,$table2){
    global $pdo;
    $sql = "SELECT p.*, u.username
    FROM  $table1 AS p JOIN  $table2 AS u ON p.id_user =u.id WHERE p.status=1
    AND p.id_topic=$idTopic";
    $query =$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


//Вывод постов по категориям
function countRow($table1){
    global $pdo;
    $sql = "SELECT COUNT(*) FROM $table1 WHERE status=1";
    $query =$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}














//INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created`) VALUES (NULL, '0', 'Han', 'han@gmail.com', '123123', CURRENT_TIMESTAMP);