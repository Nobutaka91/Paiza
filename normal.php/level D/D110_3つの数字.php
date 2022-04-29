<?php
   
    $input_line = rtrim(fgets(STDIN));
    $input = explode(' ' , $input_line);

    $one = $input[0];
    $two = $input[1];
    $three = $input[2];
    
    echo $one * $two * $three;
