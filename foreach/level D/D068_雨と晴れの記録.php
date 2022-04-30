<?php
   
    $stringLength = rtrim(fgets(STDIN));
    
    
    $inputLine = rtrim(fgets(STDIN));
    $weather_list = str_split($inputLine);

    
    $sunnyDay = 0;
    $rainyDay = 0;
    foreach ($weather_list as $weather) {
        if($weather == "S") {
            $sunnyDay ++;
        } elseif($weather == "R") {
            $rainyDay ++;
        }
    }
    
    echo $sunnyDay." ".$rainyDay;
