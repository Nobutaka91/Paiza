<?php
   
    $room_humidity = rtrim(fgets(STDIN));
    
    if ($room_humidity >= 40 && $room_humidity <= 60) {
        echo 'OK' ;
    } else {
        echo 'NG' ;
    }
