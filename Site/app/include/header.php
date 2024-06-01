<?php

include("topics.php");

?>
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