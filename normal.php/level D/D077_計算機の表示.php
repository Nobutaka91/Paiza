<?php
   
    $numbers = explode(' ' , rtrim($input_line = rtrim(fgets(STDIN))));
    $number1 = $numbers[0];     
    $number2 = $numbers[1];
    
    if($number1 * $number2 >=10000){
        echo 'NG' ;
    }else{
        echo $number1 * $number2 ;
    }
