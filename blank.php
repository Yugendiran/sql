<?php
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
    }

    return $fix_input;
}

// escapeInjection("#*=");

echo base64_encode("Abc@1234");
?>