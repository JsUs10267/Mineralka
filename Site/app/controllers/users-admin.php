<?php 
include("../../app/database/db.php");

$isSubmit = false;
$errMsg = '';

function userAuth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['user_name'];
    $_SESSION['admin'] = $user['admin'];

    if ($_SESSION['admin']){
        header('location:' . BASE_URL . 'admin/posts/index.php');
    }else{
        header('location:' . BASE_URL);
    }
}

$users = selectAll('users');

// Код для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif(mb_strlen($login, 'UTF8') < 2){
        $errMsg = "Логин не должен быть меньше двух символов!";
    }elseif ($passF !== $passS) {
        $errMsg = "Пароли не совпадают!";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email){
            $errMsg = "Пользователь с такой почтой уже зарегистрирован!";
        }else {
            $pass = $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin, 
                'user_name' => $login,
                'email' => $email,
                'password' => $pass
            ];
        
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['user_name'];
            $_SESSION['admin'] = $user['admin'];

            if ($_SESSION['admin']){
                header('location:' . 'BASE_URL', 'http://localhost/Site/' . 'admin/admin.php');
            }else{
                header('location:' . 'BASE_URL', 'http://localhost/Site/');
            }
            
        }

    }

}else{
    $login = '';
    $email = '';
}
    //$pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);

// Код для формы авторизации  
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){

    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);

    if($email === '' || $pass === ''){
        $errMsg = "Не все поля заполнены!";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence && password_verify($pass, $existence['password'])){
            $_SESSION['id'] = $existence['id'];
            $_SESSION['login'] = $existence['user_name'];
            $_SESSION['admin'] = $existence['admin'];

            if ($_SESSION['admin']){
                header('location:' . BASE_URL . 'admin/posts/index.php');
            }else{
                header('location:' . BASE_URL);
            }
        }else{
            $errMsg = "Данные введены не верно!";
        }
    }
}else{
    $email = '';
}

// Код добавления пользователя через админ панель
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif(mb_strlen($login, 'UTF8') < 2){
        $errMsg = "Логин не должен быть меньше двух символов!";
    }elseif ($passF !== $passS) {
        $errMsg = "Пароли не совпадают!";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email){
            $errMsg = "Пользователь с такой почтой уже зарегистрирован!";
        }else {
            $pass = $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin = 1;
            $user = [
                'admin' => $admin, 
                'user_name' => $login,
                'email' => $email,
                'password' => $pass
            ];
        
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);
            userAuth($user);
            
        }

    }

}else{
    $login = '';
    $email = '';
}
    //$pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);

















// Удаление пользователя через админ панель
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: ' . BASE_URL . 'admin/users/index.php');
}



// Редоктирование пользователя через админ панель
$user = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
    $user = selectOne('users', ['id' => $_GET['edit_id']]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])) {

    $id = $_POST['id'];
    $mail = trim($_POST['mail']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = isset($_POST['admin']) ? 1 : 0;

    if ($login === '') {
        $ErrMsg = "Не все поля заполнены!";
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        $ErrMsg = "Логин не может быть меньше двух символов!";
    } elseif ($passF !== $passS) {
        $ErrMsg = "Пароли в обеих полях должны соответствовать!";
    } else {
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        if (isset($_POST['admin'])) $admin = 1;
        $user = [
            'admin' => $admin,
            'user_name' => $login,
            'email' => $mail, // Обновление email
            'password' => $pass
        ];

        $user = update('users', $id, $user);
        header('location: ' . BASE_URL . 'admin/users/index.php');
        exit();
    }
}

// Этот код будет выполняться всегда после обработки GET или POST запроса
$id = $user['id'] ?? null;
$admin = $user['admin'] ?? null;
$username = $user['user_name'] ?? null;
$email = $user['email'] ?? null;
/*
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postId = update('posts', $id, ['status' => $publish]);

    header('location: ' . BASE_URL . 'admin/posts/index.php');
    exit();
}
*/