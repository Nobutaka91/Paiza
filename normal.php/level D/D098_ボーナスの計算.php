<?php
   
    $input_line = rtrim(fgets(STDIN));
    $inputs = explode(" " , $input_line);
    
    $income = $inputs[0];
    $coefficient = $inputs[1];
    
    $bonus = $income * $coefficient ;
    
    echo $bonus;
