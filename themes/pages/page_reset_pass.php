<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Проверка токена в базе данных
    $sql = "SELECT `email` FROM `remove_pass` WHERE token = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$token]);

    if ($stmt->rowCount() > 0) {
        $email = $stmt->fetchColumn();
        // Позволяем пользователю сбросить пароль
    } else {
        echo "Неверный токен.";
    }
}