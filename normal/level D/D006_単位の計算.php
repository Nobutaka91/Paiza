<?php
    
    $input_line = rtrim(fgets(STDIN));
    $inputs = explode(" " , $input_line);
    
    $distance = $inputs[0]; 
    $unit = $inputs[1];
    
    if ($unit == "km") {
        echo $distance * 1000 * 100 * 10 ;
    } elseif ($unit == "m") {
        echo $distance * 100 * 10 ;
    } else {
        echo $distance * 10 ;
    }
