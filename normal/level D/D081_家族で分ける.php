<?php
  
    $N = rtrim(fgets(STDIN));
    $input_line = rtrim(fgets(STDIN));
    $people = $N ;
    $input = explode(' ' , $input_line);
    
    echo ($input[0] * $input[1]) % $people ;
