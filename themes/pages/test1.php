<?php
session_start();
$_SESSION['auth'] = 'true';
echo $_SESSION['auth'];