<?php
    
    $number_of_sweets = rtrim(fgets(STDIN));
    
    if ($number_of_sweets %2 == 0){
        echo $number_of_sweets / 2 ;
    } else {
        echo ($number_of_sweets -1) / 2 ;
    }
