<?php
require_once "../connect.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $token = hash('sha256',$email,time());
    $reset_link = "https://myproject/page_reset_pass.php?token=$token";
}
$escaped_email = escape_db($con, $email);
$sql = "INSERT INTO `remove_pass` (`email`, `token`, `created_at`) WHERE ('$escaped_email','$token',NOW())";
$stmt = db_run($sql);
sendPasswordResetEmail($email, $reset_link);