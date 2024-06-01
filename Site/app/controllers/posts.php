<?php include('users-admin.php');

if (!$_SESSION) {
    header('location:' . BASE_URL . 'authorization.php');
}

$errMsg = [];
$id = '';
$name = '';
$title = '';
$content = '';
$img = '';
$topic = '';

$topics = selectAll('topics');
$posts = selectAll('posts');
//$postsAdm = selectAllFromPostsWithUsers('posts', 'users');


// Создание записи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])){
    //tt($_FILES);
    if (!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\images\\" . $imgName;

        if (strpos($fileType, 'image') === false) {
            array_push($errMsg, "Загружаемй файл не является изображением!");

        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if ($result) {
                $_POST['img'] = $imgName;
            }else{
                array_push($errMsg, "Ошибка загрузки изображения на сервер!");
            }
        }

        $result = move_uploaded_file($fileTmpName, $destination);

        if ($result){
            $_POST['img'] =  $imgName;
        }else{
            array_push($errMsg, "Ошибка загрузки изображения на сервер!");
        }
    }else{
        array_push($errMsg, "Ошибка получения картинки!");
    }


    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        array_push($errMsg, "Заполните поле!");
    }elseif(mb_strlen($title, 'UTF8') < 10){
        array_push($errMsg, "В названии не должно быть меньше 10 символов!");
    }elseif(mb_strlen($content, 'UTF8') > 50){
        array_push($errMsg, "Не должно быть больше 50 символов!");
    }elseif(mb_strlen($content, 'UTF8') < 20){
        array_push($errMsg, "Не должно быть меньше 20 символов!");
    }else{
            $post = [
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

    

}else{
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic = '';
}

// Редактирование записи

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $post = selectOne('posts', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];
}

if (!empty($_FILES['img']['name'])){
    $imgName = time() . "_" . $_FILES['img']['name'];
    $fileTmpName = $_FILES['img']['tmp_name'];
    $fileType = $_FILES['img']['type'];
    $destination = ROOT_PATH . "\images\\" . $imgName;

    if (strpos($fileType, 'image') === false) {
        array_push($errMsg, "Загружаемй файл не является изображением!");

    }else{
        $result = move_uploaded_file($fileTmpName, $destination);

        if ($result) {
            $_POST['img'] = $imgName;
        }else{
            array_push($errMsg, "Ошибка загрузки изображения на сервер!");
        }
    }

    $result = move_uploaded_file($fileTmpName, $destination);

    if ($result){
        $_POST['img'] =  $imgName;
    }else{
        array_push($errMsg, "Ошибка загрузки изображения на сервер!");
    }
}else{
    array_push($errMsg, "");
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])){

    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        array_push($errMsg, "Заполните поле!");
    }elseif(mb_strlen($title, 'UTF8') < 30){
        array_push($errMsg, "В названии не должно быть меньше 30 символов!");
    }elseif(mb_strlen($content, 'UTF8') > 50){
        array_push($errMsg, "В строке 'Кол-во в упаковке и цена за 1 упаковку' не должно быть больше 80 символов!");
    }elseif(mb_strlen($content, 'UTF8') < 20){
        array_push($errMsg, "Не должно быть меньше 20 символов!");
    }else{
            $post = [
                'title' => $title,
                'content' => $content,
                'img' => $_POST['img'],
                'status' => $publish,
                'id_topic' => $topic
            ];
            
            $post = update('posts', $id, $post);
            header('location: ' . BASE_URL . 'admin/posts/index.php');
            
        }

    

}else{
    $title = '';
    $content = '';
    $publish = isset($_POST['publish']) ? 1 : 0;
    $topic = '';
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postId = update('posts', $id, ['status' => $publish]);

    header('location: ' . BASE_URL . 'admin/posts/index.php');
    exit();
}


// Удаление записи

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
}
