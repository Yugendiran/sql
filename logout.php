<?php
ob_start();
session_start();
unset($_SESSION['sql_user_loginf']);
header("location: login.php");
?>