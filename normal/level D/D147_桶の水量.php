<?php
   
    $S = rtrim(fgets(STDIN));
    $A = rtrim(fgets(STDIN));
    $input = explode(" " , $A);
    
    echo $S * min($input);
