<?php
    $input_line = rtrim(fgets(STDIN));
    $input = explode(' ' , $input_line);
    
    $taxRate = $input[0] * $input[1] * 0.01;
    $newTaxRate = $input[0] * $input[2] * 0.01;
    
    echo $newTaxRate - $taxRate ;
