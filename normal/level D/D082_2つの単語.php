<?php
    
    $A = rtrim(fgets(STDIN));
    $B = rtrim(fgets(STDIN));
    
    $sub_A = substr($A , -1) ;
    $sub_B = substr($B , 0 , 1);
    $sub_C = substr($B , -1 ,1);
    
    if ($sub_A = $sub_B && $sub_C != "n") {
        echo "OK" ;
    } else {
        echo "NG" ;
    }
