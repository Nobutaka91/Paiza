<?php
   
    $input_line = rtrim(fgets(STDIN));
    $input = explode(" " , $input_line);
    
    $total = $input[0]*6000 + $input[1]*4000 ;
    echo $total;
