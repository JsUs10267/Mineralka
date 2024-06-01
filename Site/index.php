<?php include("path.php");
    include ("app/controllers/topics.php");
    $posts = selectAll('posts', ['status' => 1]);
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

    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

    <!--Библиотека jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--Готовый скрипт корзины-->
    <script defer src="https://lk.easynetshop.ru/frontend/v5/ens-49ee7a2f.js"></script>

    <!--Стили элементов для корзины-->
    <link href="https://lk.easynetshop.ru/frontend/v5/ens-49ee7a2f.css" rel="stylesheet">

    <title>Site</title>
  </head>
  <body>

<header>
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h1>
                    <img src="images/ren.png" class="ren" alt="...">
                </h1>
            </div>
            <nav class="col-10">
                <ul>
                    <li><a href="<?php echo BASE_URL?>">Главная</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="#">Условия доставки</a></li>
                    <li>
                        <?php if (isset($_SESSION['id'])): ?>

                                <a href="<?php echo BASE_URL . 'authorization.php'?>">
                                    <i class="fa fa-user"></i>
                                    <?php echo $_SESSION['login']; ?>
                                </a>
                            <ul>
                                <?php if ($_SESSION['admin']): ?>
                                <li><a href="<?php echo BASE_URL . 'admin/posts/index.php'?>">Админ панель</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo BASE_URL . "logout.php"?>">Выход</a></li>
                            </ul>

                        <?php else: ?>

                            <a href="<?php echo BASE_URL . 'authorization.php'?>">
                                <i class="fa fa-user"></i>
                                Личный кабинет
                            </a>
                                <ul>
                                    <li><a href="<?php echo BASE_URL . 'authorization.php'?>">Войти</a></li>
                                    <li><a href="<?php echo BASE_URL . 'reg.php'?>">Регистрация</a></li>
                                </ul>

                        <?php endif; ?>

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

    <!--Карусель-->
    <div class="container">
        <div class="row">
            <h2 class="slider-title">Мир минеральных вод</h2>
        </div>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/imag_1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/imag_2.jpg" class="d-block w-100" alt="...">
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!--Main-->

    <div class="container">
        <div class="row">

            <!--Main-->
            <div class="main-content col-md-9 col-12">
                <h2>Лидеры продаж</h2>

                <div class="post row">
                    <div class="img col-md-4">
                        <img src="images/imag_3.png" alt="" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                        Минеральная вода Стэлмас Zn-Se 0,6л вода пит. ГАЗ пэт
                        </h3>
                    <div class="price">
                        <li>В упаковке — 12</li>
                        <li>Стоимость за 1 уп. — 444 ₽</li>
                    </div>
                        <div class="btn-keeper">
                            <a class="btn" href="#">Добавить в корзину</a>
                        </div>
                    </div>
                </div>

                <div class="post row">
                    <div class="img col-md-4">
                        <img src="images/imag_4.jpg" alt="" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            Минеральная вода Стэлмас Zn-Se 1,5л вода пит. ГАЗ
                        </h3>
                    <div class="price">
                        <li>В упаковке — 6</li>
                        <li>Стоимость за 1 уп. —  276 ₽</li>
                    </div>
                        <div class="btn-keeper">
                            <a class="btn" href="#">Добавить в корзину</a>
                        </div>
                    </div>
                </div>

                <div class="post row">
                    <div class="img col-md-4">
                        <img src="images/image_5.png" alt="" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            Минеральная вода Стэлмас Mg+ м/в 1л ГАЗ
                        </h3>
                    <div class="price">
                        <li>В упаковке — 6</li>
                        <li>Стоимость за 1 уп. —  396 ₽</li>
                    </div>
                        <div class="btn-keeper">
                            <a class="btn" href="#">Добавить в корзину</a>
                        </div>
                    </div>
                </div>

                <div class="post row">
                    <div class="img col-md-4">
                        <img src="images/image_6.png" alt="" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            Минеральная вода Стэлмас O2 1,5л м/в н/г (С КИСЛОРОДОМ)
                        </h3>
                    <div class="price">
                        <li>В упаковке — 6</li>
                        <li>Стоимость за 1 уп. —  276 ₽</li>
                    </div>
                        <div class="btn-keeper">
                            <a class="btn" href="#">Добавить в корзину</a>
                        </div>
                    </div>
                </div>

            </div>

            <!--Sidebar-->
            <div class="sidebar col-md-3 col-12">
                <div class="section search">    

                    
                    <div class="section korzina">
                        <li><a href="#">Корзина</a>
                        <i class="fa fa-shopping-cart"></i>
                    </div>


                    <div class="section topics">
                        <h3>Каталог</h3>
                        <ul>
                            <?php foreach ($topics as $key => $topic):?>
                            <li>
                                <a href="<?=BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?=$topic ['name']; ?></a>
                            </li> 
                            <?php endforeach; ?>
                        </ul>
                    </div>
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