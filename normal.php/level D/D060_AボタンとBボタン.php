<?php
   
    $input_line = rtrim(fgets(STDIN));
    $inputs = explode(" " , $input_line);
    
    $go = $inputs[0];
    $back = $inputs[1];
    
    $total = $go - $back ;
    
    echo $total;
