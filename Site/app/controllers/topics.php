<?php include('users-admin.php');

$errMsg = '';
$id = '';
$name = '';
$topics = selectAll('topics');

// Создание категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){

    $name = trim($_POST['name']);

    if($name === ''){
        $errMsg = "Заполните поле!";
    }elseif(mb_strlen($name, 'UTF8') < 4){
        $errMsg = "В названии категории не должно быть меньше 4 символов!";
    }elseif(mb_strlen($name, 'UTF8') > 20){
        $errMsg = "В названии категории не должно быть больше 20 символов!";
    }else{
        $existence = selectOne('topics', ['name' => $name]);
        if (!empty($existence['name']) && $existence['name'] === $name){
            $errMsg = "Категория с таким названием уже существует!";
        }else {
            $topic = [
                'name' => $name
            ];
        
            $id = insert('topics', $topic);
            $topic = selectOne('topics', ['id' => $id]);
            header('location: ' . BASE_URL . 'admin/topics/index.php');
            
        }

    }

}else{
    $name = '';
}

// Редактирование категории

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){

    $name = trim($_POST['name']);

    if($name === ''){
        $errMsg = "Заполните поле!";
    }elseif(mb_strlen($name, 'UTF8') < 4){
        $errMsg = "В названии категории не должно быть меньше 4 символов!";
    }elseif(mb_strlen($name, 'UTF8') > 20){
        $errMsg = "В названии категории не должно быть больше 20 символов!";
    }else{
        $existence = selectOne('topics', ['name' => $name]);
        if (!empty($existence['name']) && $existence['name'] === $name){
            $errMsg = "Категория с таким названием уже существует!";
        }else {
            $topic = [
                'name' => $name
            ];
        
            $id = $_POST['id'];
            $topic_id = update('topics', $id, $topic);
            header('location: ' . BASE_URL . 'admin/topics/index.php');
            
        }

    }

}

// Удаление категории

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('topics', $id);
    header('location: ' . BASE_URL . 'admin/topics/index.php');
}