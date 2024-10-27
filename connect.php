<?php
session_start();
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$con = new mysqli("localhost", "root", "", "myproject");
require_once "functions/functions.php";
require_once "functions/base/base.php";
