<?php require_once "../blocks/head.php"?>
<?php require_once "../blocks/header.php"?>
<h1>Регистрация</h1>
<form action="../../handlers/reg.php" method="POST">
    <input name="name" placeholder="name">
    <br>
    <input name="email" placeholder="email">
    <br>
    <input name="pass" type="password" placeholder="password">
    <br>
    <input type="submit">
</form>
<?php require_once "../blocks/footer.php"?>
