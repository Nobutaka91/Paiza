<?php
   
    $total = 1 + 2 + 3 + 4 + 5 ;
    $c = 0;
    for($i = 0; $i <=3; $i++ ){
        $c += rtrim(fgets(STDIN)) ;
    }
    echo $total - $c;
