<?php
    
    $humidity = trim(fgets(STDIN));
    $result = check($humidity);
    echo $result;
    
    function check($humidity) {
        $result = (40 <= $humidity && $humidity <= 60) ? "OK" : "NG";
        return $result;
    }
