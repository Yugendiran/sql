<?php

ob_start();
session_start();
date_default_timezone_set('Asia/Kolkata');

$current_date = date('d-m-Y H:m:s');

$connection = mysqli_connect('localhost', 'root', '', 'sql');

if(!$connection){
    echo "<script>alert('Oops... Database Not Connected.');</script>";
}else{
    $login_session_user_id = 1;
}

function escapeInjection($query){
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

    if(count($error_count) >= 1){
        echo "user blocked";
        die;
    }

    return $fix_input;
}

?>