<?php
   
    $input_line = rtrim(fgets(STDIN));
    $inputs = explode(" " , $input_line);
    
    $tree = $inputs[0];
    $interval = $inputs[1];
    $lamp = $inputs[2];
        
    $outcome = floor($tree / $interval) * $lamp ;
    
    echo $outcome ;
