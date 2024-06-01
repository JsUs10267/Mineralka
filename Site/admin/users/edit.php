<?php include("../../path.php"); 
include "../../app/controllers/users-admin.php";
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Стили CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Подключение к CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesom -->
    <script src="https://kit.fontawesome.com/c9f0968ca7.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

    <title>Site</title>
  </head>
  <body>

<header>
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h1>
                    <img src="../../images/ren.png" class="ren" alt="...">
                </h1>
            </div>
            <nav class="col-10">
                <ul>
                    <li>
                        <a href="<?php echo BASE_URL . 'authorization.php'?>">
                            <i class="fa fa-user"></i>
                            <?php echo $_SESSION['login']; ?>
                        </a>
                    </li>            
                        <li>
                            <a href="<?php echo BASE_URL . "logout.php"?>">Выход</a>
                        </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>

            <div class="posts col-9">
                <div class="row title-table">
                    <h2>Создать пользователя</h2>
                </div>
                <div class="row add-post">
                    <div class = "err">
                        <p><?=$errMsg?></p>
                    </div>
                    <form action="edit.php" method="post">
                        <input name="id" value="<?=$id; ?>" type="hidden">
                        <div class="col">
                            <label for="formGroupExampleInput" class="form-label">Логин</label>
                            <input name="login" value="<?=$username; ?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="введите логин">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input name="mail" value="<?=$email; ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите email">
                        <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Сбросить пароль</label>
                            <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="введите пароль">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                            <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="введите пароль">
                        </div>
                            <label class="form-check-label" for="flexCheckChecked">
                                Admin
                            </label>
                            <input name="admin" class="form-check-input" value="1" type="checkbox" id="flexCheckChecked">
                        <div class="col">
                            <button name="update-user" class="btn btn-primary" type="submit">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->

    <div class="footer container-fluid">
        <div class="footer-content-news container">
          <div class="row">
            <div class="footer-section about col-md-4 col-12">
              <p>
                <div class="copyright">Copyright © 2009-2024.</div> Все права защищены.
                +7 (927) 908-64-68
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>