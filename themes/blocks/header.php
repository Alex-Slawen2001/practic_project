<?php session_start();?>
<body>
<header>
    <h1>Приветствуем на нашем сайте!</h1>
    <nav>
        <a href="/">Главная</a>
        <a href="/themes/pages/about">О нас</a>
        <a href="/themes/pages/contacts">Контакты</a>
        <a href="/themes/pages/news">Новости</a>
        <a href="/themes/pages/otzivi">Отзывы</a>
        <a href="/themes/pages/posts">посты</a>
        <?php if ($_SESSION['auth'] == 'true') {?>
            <a href="/themes/pages/user/index.php">Личный кабинет</a>
            <form method="post" action="/handlers/logout.php">
                <input type="submit" name="logout" value="Выйти">
            </form>
        <?php }else {?>
        <a href="/themes/pages/auth">Войти</a>
        <a href="/themes/pages/reg">Регистрация</a>
        <?php }?>
    </nav>
</header>
