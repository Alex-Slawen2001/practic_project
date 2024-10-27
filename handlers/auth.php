<?php
require_once "../connect.php";
if (!empty($_POST['password']) && !empty($_POST['login'])) {
    $login = $_POST['login'];
    $login = validate_name($login);
    $password = $_POST['password'];
    $password = validate_password($password);
//    $password = md5($_POST['password']);
    $stmt = $con->prepare("SELECT * FROM `users` WHERE `name`=? AND `pass`=?");
    $stmt->bind_param("ss",$login,$password);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();
    if ($user) {
    $_SESSION['auth'] = 'true';
    header("location:/themes/pages/user/index.php");
    exit();
    }else {
        echo "неверный логин или пароль";
        exit();
    }

}