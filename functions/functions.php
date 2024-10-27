<?php
function customErrorHandler($errno, $errstr, $errfile, $errline) {
if (strpos($errstr,'session') !== false) {
    echo "Ошибка записи в сессию: $errstr";
}
}
function db_run($sql) {
    global $con;
     return mysqli_query($con,$sql);

}
function select_all($db) {
    global $con;
    $sql = "SELECT * FROM `$db`";
    $res = db_run($sql);
   return $res->fetch_all(MYSQLI_ASSOC);
}
function select_one($db,$field,$value) {
    global $con;
    $sql = "SELECT * FROM `$db` WHERE `$field` = '$value'";
    $res = db_run($sql);
    $row = $res->fetch_assoc();
    return $row;

}
function check_user($name):bool {
  $sql = "SELECT count(id) FROM `users` WHERE `name` = '$name'";
  $res = db_run($sql);
  $row = $res->fetch_assoc();
    if ((int) $row['count(id)'] > 0) {
        return false;
    }
    return true;

}
function escape_db ($con,$string) {
    return mysqli_real_escape_string($con,$string);
}
function sendPasswordResetEmail($email, $resetLink) {
    $subject = "Сброс пароля";
    $message = "Для сброса пароля перейдите по следующей ссылке: <a href='$resetLink'>$resetLink</a>";
    $headers = "From: your_email@example.com\r\n" .
        "Reply-To: your_email@example.com\r\n" .
        "Content-Type: text/html; charset=UTF-8\r\n";

    if (mail($email, $subject, $message, $headers)) {
        echo 'Письмо отправлено';
    } else {
        echo 'Ошибка при отправке письма';
        exit();
    }
    return $message;
}