<?php
  
    $N = rtrim(fgets(STDIN));
    
    $sum = 0;
    for($i = 1; $i <= $N; $i++ ){
        $sum = $sum + $i;
    }
    echo $sum;
