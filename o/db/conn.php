<?php

ob_start();
session_start();
date_default_timezone_set('Asia/Kolkata');

$current_date = date('d-m-Y H:m:s');

$connection = mysqli_connect('localhost', 'root', '', 'sql');

if(!$connection){
    echo "<script>alert('Oops... Database Not Connected.');</script>";
}else{
    if(isset($_SESSION['sql_user_logino'])){
        $login_sessiono_user_id = $_SESSION['sql_user_logino'];

        $select_exist_user_query = "SELECT * FROM users WHERE users_id = $login_sessiono_user_id";
        $select_exist_user_result = mysqli_query($connection, $select_exist_user_query);
        $exist_user_count = mysqli_num_rows($select_exist_user_result);
        if($exist_user_count < 1){
            header('location: logout.php');
        }else{
            while($row = mysqli_fetch_assoc($select_exist_user_result)){
                $fetch_user_name = $row['users_name'];
                $fetch_user_email = $row['users_email'];
            }
        }
    }
}

function alertBox($msg){
    echo "<script>alert('$msg');</script>";
}

function prevent_mode($fix_query,$pre_sec){
    global $connection;
    global $current_date;
    global $fetch_user_name;
    global $fetch_user_email;

    $prevent_sec = $pre_sec;
    $curr_page_name = basename($_SERVER['PHP_SELF']);

    if(isset($_SESSION['sql_user_logino'])){
        global $login_sessiono_user_id;

        $prevent_query = "INSERT INTO prevent(prevent_user_id,prevent_time,prevent_attack, prevent_page, prevent_section, prevent_user_name, prevent_user_email) VALUES($login_sessiono_user_id, '$current_date', '$fix_query', '$curr_page_name', '$prevent_sec', '$fetch_user_name', '$fetch_user_email')";
        $prevent_result = mysqli_query($connection, $prevent_query);

        $block_user_query = "DELETE FROM users WHERE users_id = $login_sessiono_user_id";
        $block_user_result = mysqli_query($connection, $block_user_query);

        if(!$block_user_result){
            alertBox("Something went wrong");
        }else{
            alertBox("User terminated");
        }
    }else{
        $prevent_query = "INSERT INTO prevent(prevent_time,prevent_attack, prevent_page, prevent_section) VALUES('$current_date', '$fix_query', '$curr_page_name', '$prevent_sec')";
        $prevent_result = mysqli_query($connection, $prevent_query);
        
        if(!$prevent_result){
            alertBox("Something went wrong");
        }else{
            alertBox("Module Prevented");
        }
    }
}

function escapeInjection($query, $sec){
    $split = str_split($query);
    $error_count = array();
    $break_input = array();

    for($i = 0; $i < count($split); $i++){
        $sql_keywords = "' - ; # / ! * , = ( )";

        if(strpos($sql_keywords, $split[$i]) !== false){
            array_push($error_count, $split[$i]);
        }

        array_push($break_input, $split[$i]);
    }

    $fix_input = implode($break_input);
    $fix_input = str_replace("'", "./", $fix_input);
    $fix_input = str_replace("-", "-/", $fix_input);
    $fix_input = str_replace(";", ";/", $fix_input);
    $fix_input = str_replace("#", "#/", $fix_input);
    $fix_input = str_replace("/", "//", $fix_input);
    $fix_input = str_replace("!", "!/", $fix_input);
    $fix_input = str_replace("*", "*/", $fix_input);
    $fix_input = str_replace(",", ",/", $fix_input);
    $fix_input = str_replace("=", "=/", $fix_input);
    $fix_input = str_replace("(", "(/", $fix_input);
    $fix_input = str_replace(")", ")/", $fix_input);

    if(count($error_count) >= 3){
        prevent_mode($fix_input, $sec);
    }

    return $fix_input;
}

?>