<?php
   
    $input_line1 = rtrim(fgets(STDIN));
    $input_line2 = rtrim(fgets(STDIN));
    
    $inputs1 = explode(" " , $input_line1);
    $inputs2 = explode(" " , $input_line2);
    
    $n1 = $inputs1[0];
    $n2 = $inputs1[1];
    $n3 = $inputs2[0];
    $n4 = $inputs2[1];
    
    $total = $n1 * $n4 - $n3 * $n2 ;
    
    echo $total;
