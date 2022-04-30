<?php
 
    $precipitation_rate = rtrim(fgets(STDIN));
    
    if ($precipitation_rate >= 0 && $precipitation_rate < 30 ){
        echo 'sunny' ;
    } elseif ($precipitation_rate >= 30 && $precipitation_rate < 70 ){
        echo 'cloudy' ;
    } else {
        echo 'rainy' ;
    }
