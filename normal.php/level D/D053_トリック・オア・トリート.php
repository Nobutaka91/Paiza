<?php
 
    $sweets = trim(fgets(STDIN));
    
    if($sweets == 'candy') {
        echo 'Thanks!' ;
    } elseif ( $sweets == 'chocolate') {
        echo 'Thanks!' ;
    } else {
        echo 'No!' ;
    }
