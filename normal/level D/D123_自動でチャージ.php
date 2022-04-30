<?php
    
    $balance = rtrim(fgets(STDIN));
    
    if($balance < 10000){
        echo $balance = $balance + 10000 ;
    }else{
        echo $balance ;
    }
