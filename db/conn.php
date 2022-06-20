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

        $select_exist_user_query = "SELECT * FROM users WHERE users_id = $login_sessionf_user_id";
        $select_exist_user_result = mysqli_query($connection, $select_exist_user_query);
        $exist_user_count = mysqli_num_rows($select_exist_user_result);
        if($exist_user_count < 1){
            header('location: logout.php');
        }else{
            while($row = mysqli_fetch_assoc($select_exist_user_result)){
                $fetch_user_id = $row['users_id'];
                $fetch_user_name = $row['users_name'];
                $fetch_user_email = $row['users_email'];
            }
        }
    }
}

function alertBox($msg){
    echo "<script>alert('$msg');</script>";
}

?>