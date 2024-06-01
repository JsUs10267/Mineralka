<?php

session_start();
require('connect.php');

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}

// Проверка выполнения запроса к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}

//Запрос на получение данных одной таблицы
function selectAll($table, $params=[]){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value="'".$value."'";
            }
            if ($i === 0){
                $sql=$sql . " WHERE $key = $value";
            }else{
                $sql=$sql . " AND $key = $value";
            }
            $i++;
        }
    }
//    tt($sql);
//    exit();

    $query = $pdo->prepare($sql);
    $query -> execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params=[])
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params)){
        $i=0;
        foreach ($params as $key => $value){
            if(!is_numeric($value))
            {
                $value="'".$value."'";
            }
            if ($i === 0){
                $sql=$sql . " WHERE $key = $value";
            }else{
                $sql=$sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $sql = $sql . " LIMIT 1";

    //tt($sql);
    //exit();

    $query = $pdo->prepare($sql);
    $query -> execute();
    dbCheckError($query);
    return $query->fetch();
}

//tt(selectAll('users', $params));
//tt(selectOne('users', $params));

// Зпись в таблицу БД

function insert($table, $params){
    global $pdo;
    // INSERT INTO `users` (admin, user_name, email, password) VALUES ('0', 'Артём', 'artTest@gmail.com', '4444');
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
        }else{
        $coll = $coll . ", $key";
        $mask = $mask . ", '" .  "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask);";

    //tt($sql);
    //exit();
    $query = $pdo->prepare($sql);
    $query -> execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}

// Обнавление строки в таблице
function update($table, $id, $params){
    global $pdo;
    // INSERT INTO `users` (admin, user_name, email, password) VALUES ('0', 'Артём', 'artTest@gmail.com', '4444');
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }else{
            $str = $str .", " . $key . " = '" .  $value . "'";
        }
        $i++;
    }
    //UPDATE `users` SET `user_name`='test' WHERE `id` = 14
    $sql = "UPDATE $table SET $str WHERE id = $id";
    //tt($sql);
    //exit();

    $query = $pdo->prepare($sql);
    $query -> execute($params);
    dbCheckError($query);
}

//$param =[
//    'admin' => '1'
//];

//update('users', 2, $param);

// Удаление строки в таблице
function delete($table, $id){
    global $pdo;
    // INSERT INTO `users` (admin, user_name, email, password) VALUES ('0', 'Артём', 'artTest@gmail.com', '4444');

    //UPDATE `users` SET `user_name`='test' WHERE `id` = 14
    $sql = "DELETE FROM $table WHERE id =". $id;
    //tt($sql);
    //exit();

    $query = $pdo->prepare($sql);
    $query -> execute();
    dbCheckError($query);
}

//delete('users', 8);

//Выборка записей с автором в админку
/*
function selectAllFromPostsWithUsers($table1, $table2){
    global $pdo;
    $sql = "
    SELECT
    t1.id,
    t1.title,
    t1.img,
    t1.content
    t1.status,
    t1.id_topic,
    t2.user_name
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";

    $query = $pdo->prepare($sql);
    $query -> execute();
    dbCheckError($query)
    return $query->fetchAll();
}
*/