<?php

    header('Content-Type: application/json');
    $json_str = file_get_contents("products.json");
    $json_array = json_decode($json_str, true);

    foreach ($json_array as $key => $value) {
        if(is_array($value))
            echo $key."\n";
        else
            echo $value . "\n";
    }
    //print_r($json_array);
?>