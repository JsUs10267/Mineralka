<?php include("path.php"); ?>
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

    <title>Site</title>
  </head>
  <body>
    
  <?php include("app/include/header.php"); ?>

    <!--Main-->

    <div class="container">
        <div class="row">

            <!--Main-->
            <div class="main-content col-md-9 col-12">
                <h2>Минеральные воды</h2>

                <div class="post row">
                    <div class="img col-md-4">
                        <img src="images/image_9.jpg" alt="" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            Минеральная вода Стэлмас Zn-Se 0,6л ГАЗ
                        </h3>
                    <div class="price">
                        <li>В упаковке — 12</li>
                        <li>Стоимость за 1 уп. — 480 ₽</li>
                    </div>
                        <div class="btn-keeper">
                            <a class="btn" href="#">Добавить в корзину</a>
                        </div>
                    </div>
                </div>

                <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="images/image_10.jpg" alt="" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            Архыз 0,5л м/в НЕГАЗ СТЕКЛО (фирм с винтом)
                        </h3>
                    <div class="price">
                        <li>В упаковке — 20</li>
                        <li>Стоимость за 1 уп. — 1 280 ₽</li>
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
                    
                    <div class="section poisk">
                        <h3>Поиск</h3>
                        <from action="#" method="post">
                            <input type="text" name="search-trem" class="text-input" placeholder="Текст сюда">
                        </from>
                    </div>

                    <div class="section topics">
                        <h3>Каталог</h3>
                        <ul>
                            <li><a href="mineralka.php">Минеральные воды</a></li> 
                            <li><a href="#">Питьевые воды</a></li>
                            <li><a href="#">Вода для детей</a></li>
                            <li><a href="#">Лимонады</a></li>
                            <li><a href="#">Соки</a></li>
                            <li><a href="#">Квасы</a></li>
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