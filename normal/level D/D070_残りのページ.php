<?php
   
    $input_line = rtrim(fgets(STDIN));
    $inputs = explode(" " , "$input_line");

    $total = $inputs[0];
    $finished = $inputs[1];
    
    $remains = $total - $finished ;
    
    echo $remains;
