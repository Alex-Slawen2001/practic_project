<?php require_once "../blocks/head.php"?>
<?php require_once "../blocks/header.php"?>
    <h1>Восстановление пароля</h1>
<form method="POST" action="../../handlers/remove_pass.php">
    <label for="email">Введите ваш email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Сбросить пароль</button>
</form>
<?php require_once "../blocks/footer.php"?>