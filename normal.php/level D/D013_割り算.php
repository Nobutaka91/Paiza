<?php
    
    $input_line = rtrim(fgets(STDIN));
    $numbers = explode(" " , $input_line);
    
    echo floor($numbers[0]/$numbers[1]) ." " . $numbers[0]%$numbers[1];
