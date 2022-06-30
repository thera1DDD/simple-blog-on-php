<?php include SITE_ROOT."/app/database/db.php";

$errMessage = [];
$users = selectAll('users');
function UserAuth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
    else{
        header('location: '.BASE_URL);
    }
}
    #Код формы авторизации
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
        $email = trim($_POST['email']);
        $pass = trim($_POST['password']);
        $existence = selectOne('users',['email'=>$email]);
        if($existence && password_verify($pass, $existence['password'])){
           $_SESSION['id'] =$existence['id'];
           $_SESSION['login'] =$existence['username'];
           $_SESSION['admin']= $existence['admin'];
           header('location: '. BASE_URL);
        }
        else{
            array_push($errMessage, 'Неравильный логин или пароль!');
        }
    }
    else{
        $email ='';
    }
//Код формы регистрации
if ($_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['button-reg'])) {
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
//проверка юзера
    $existence = selectOne('users', ['email' => $email]);
    if($existence['email' ] !== $email ){
        $pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $pass
        ];
        $errMessage ='';
        $id = insert('users', $post);
        $user =selectOne('users',['id'=>$id]);

        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];
        if ($_SESSION['admin']) {
            header('location: ' . BASE_URL . 'admin/posts/index.php');
        }
        else{
            header('location: '.BASE_URL);
        }
    }
    else{
        array_push($errMessage, 'Такая почта уже сущетсвует');
    }
}
else{
    $email ='';
}

//Код добавления пользователя в админке
if ($_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['create_user'])) {
    $admin = 0;
    if(isset($_POST['admin'])){$admin =1;} else{$admin =0;}
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    if($login===''|| $email===''){
        array_push($errMessage,'Не все поля заполненны!');
    }
    elseif(mb_strlen($login,'UTF-8')<2){
        array_push($errMessage,'Логин должен быть больше 2-х символов!');
    }
    elseif($passF!==$passS){
        array_push($errMessage,'Пароли в обоих полях должны соответствовоать!');
    }
    else{
        //проверка юзера
        $existence = selectOne('users', ['email' => $email]);
        if($existence['email' ] !== $email ){
            $pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $errMessage ='';
            $id = insert('users', $user);
            $user =selectOne('users',['id'=>$id]);
            UserAuth($user);
        }
        else{
            array_push($errMessage, 'Такая почта уже сущетсвует');
        }
    }
}
else{
    $email ='';
}
//Удаление пользователя
if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['delete_id'])){
    $id =$_GET['delete_id'];
    delete('users',$id);
    header('location: ' . BASE_URL . 'admin/users/index.php');
}



//Редактирование пользователя через админку
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
    $user = selectOne('users', ['id' => $_GET['edit_id']]);
    $id = $user['id'];
    $admin = $user['admin'];
    $login = $user['username'];
    $email = $user['email'];

}
//Обновление выведенных данных
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $email = trim($_POST['email']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = isset($_POST['admin']) ? 1 : 0;
    if ($login === '') {
        array_push($errMessage, "Не все поля заполненны!");
    }elseif (mb_strlen($login, 'UTF-8') < 2) {
        array_push($errMessage, "Логин должен быть более 2х символов");
    }elseif($passF!==$passS){
        array_push($errMessage,'Пароли в обоих полях должны соответствовоать!');
    }
    else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        if(isset($_POST['admin'])){$admin =1;} else{$admin =0;}
        $user = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $pass
        ];
        $user = update('users',$id,$user);
        header('location: ' . BASE_URL . 'admin/users/index.php');
    }
}
else{

}
