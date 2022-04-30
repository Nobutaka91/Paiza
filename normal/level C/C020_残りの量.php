<?php
    
    $input_line = explode(" " ,fgets(STDIN));
    $fleshFood_kg = $input_line[0];
    $sold1st_％ = $input_line[1];
    $sold2nd_％ = $input_line[2];
    
    $processingFood_kg = $fleshFood_kg * (100-$sold1st_％) / 100;
    
    $unsoldFood = $processingFood_kg * (1 - $sold2nd_％ / 100);
    
    echo $unsoldFood;
