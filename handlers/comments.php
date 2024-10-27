<?php
require_once "../connect.php";
$name = $_POST['name'];
$text = $_POST['comment'];
$date = date('Y-m-d');
$id = $_POST['article_id'];

$sql = "INSERT INTO `comments` (`name`,`text`,`date`,`id_article`) VALUES ('$name', '$text', '$date', '$id')";
db_run($sql);
