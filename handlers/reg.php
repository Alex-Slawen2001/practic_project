<?php
require_once "../connect.php";
$name = $_POST['name'];
$name = validate_name($name);
$email = $_POST['email'];
$email = validate_login($email);
$pass = $_POST['pass'];
$pass = validate_password($pass);

if (!empty($name) && !empty($email) && !empty($pass)) {

    // Экранируем данные
    $escaped_name = escape_db($con, $name);
    $escaped_email = escape_db($con, $email);
    $escaped_pass = escape_db($con, $pass);

    // Формируем SQL-запрос с кавычками
    $sql = "INSERT INTO `users` (`name`, `email`, `pass`) 
VALUES ('$escaped_name', '$escaped_email', '$escaped_pass')";

//    echo $sql; // Выводим для отладки

    if (check_user($escaped_name) == true) {
        $res = db_run($sql); // Выполняем запрос на добавление пользователя

        if ($res) {
            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['id'] = mysqli_insert_id($con);
            header("location:/themes/pages/user/index.php");
            exit();
        } else {
            die('Ошибка при добавлении пользователя: ' . mysqli_error($con));
        }
    } else {
        die('Пользователь с таким именем уже существует');
    }
} else {
    die('Что-то пошло не так');
}