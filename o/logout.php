<?php
ob_start();
session_start();
unset($_SESSION['sql_user_logino']);
header('location: login.php');
?>