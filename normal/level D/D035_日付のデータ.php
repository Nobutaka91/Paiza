<?php
    $input_line = trim(fgets(STDIN));
    $inputs = explode(" ", $input_line);
    
    $result = implode("/", $inputs);
    echo $result;
