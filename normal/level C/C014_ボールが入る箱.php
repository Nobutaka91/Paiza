<?php
   
    $n_r = explode(" " ,rtrim(fgets(STDIN)));
    $box = $n_r[0];
    $radius = $n_r[1];
    $diameter = $radius * 2 ;
    
    for($i = 1; $i <= $box; $i ++ ) {
        $h_w_d = explode(" " , rtrim(fgets(STDIN)));
        $lowest_length = min($h_w_d);
        
        if($lowest_length >= $diameter ) {
            echo $i . "\n" ;
        }
    }
