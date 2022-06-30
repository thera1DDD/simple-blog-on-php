<?php
$driver ='mysql';
$host = 'http://superblog.zzz.com.ua/';
$db_name = 'thera1ddd';
$db_user = 'thera1ddd';
$db_pass = 'Newpassword123';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];

try{
        $pdo= new PDO(
            "$driver:host=$host;dbname=$db_name;charset=$charset",
            $db_user,$db_pass,$options
        );

}
catch (PDOException $i){
    die("Ошибка подключения к базе данных");
}
