<?php 
include("db.php");

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
