<?php require_once "../blocks/head.php"?>
<?php require_once "../blocks/header.php"?>
<h1>Авторизация</h1>
<form action="../../handlers/auth.php" method="POST">
    <input name="login" placeholder="Введите логин">
    <br>
    <input name="password" type="password" placeholder="Введите пароль">
    <br>
    <input type="submit" value="Отправить">
</form>
<p><a href="remove_pass.php">Забыли пароль?</a></p>
<?php require_once "../blocks/footer.php"?>

