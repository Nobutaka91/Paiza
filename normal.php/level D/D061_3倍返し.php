<?php
   
    $getChocolate = rtrim ( fgets ( STDIN ) );
    
    
    if ($getChocolate >= 1) {
        echo $getChocolate * 3 ;
    } else {
        echo 1 ;
    }
