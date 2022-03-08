<?php
function escapeInjection($query){
    echo str_replace("'", "'/", $query);
}
?>