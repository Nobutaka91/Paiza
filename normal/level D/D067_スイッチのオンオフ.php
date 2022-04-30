<?php
    
    $number_of_presses = rtrim(fgets(STDIN));
    
    if($number_of_presses %2 == 0){
        echo 'OFF' ;
    }else{
        echo 'ON';
    };
