<?php
   
    $n = rtrim(fgets(STDIN));
    $sum = 0;
    for ($i = 1; $i <= 9; $i++ ) {
        $sum = $i * $n ;
        echo $sum . ' ';
    }
