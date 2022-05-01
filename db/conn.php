<?php

ob_start();
session_start();
date_default_timezone_set('Asia/Kolkata');

$current_date = date('d-m-Y H:m:s');

$connection = mysqli_connect('localhost', 'root', '', 'sql');

if(!$connection){
    echo "<script>alert('Oops... Database Not Connected.');</script>";
}else{
    if(isset($_SESSION['sql_user_loginf'])){
        $login_sessionf_user_id = $_SESSION['sql_user_loginf'];
    }
}

function alertBox($msg){
    echo "<script>alert('$msg');</script>";
}

?>