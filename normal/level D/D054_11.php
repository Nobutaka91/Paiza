<?php
   
    $s = rtrim(fgets(STDIN));
    $bar_num = mb_strlen($s);
    
    if ($bar_num >= 11) {
        echo "OK";
    } else {
        echo 11 - $bar_num ;
    }
