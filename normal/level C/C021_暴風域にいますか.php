<?php
   
    $input_line = explode(" " ,fgets(STDIN));
    $cycloneCenterX =$input_line[0];
    $cycloneCenterY =$input_line[1];
    $cycloneRadius_small =$input_line[2];
    $cycloneRadius_large =$input_line[3];
    $personNumber = trim(fgets(STDIN));

    for($i = 0; $i < $personNumber; $i++) {
     $input_line = explode(" " ,fgets(STDIN));
     $manPositionX = $input_line[0];
     $manPositionY = $input_line[1];
     
     $differenceX = $manPositionX - $cycloneCenterX;
     $differenceY = $manPositionY - $cycloneCenterY;
        if ($cycloneRadius_small**2 <= $differenceX**2 + $differenceY**2
            && $differenceX**2 + $differenceY**2 <= $cycloneRadius_large**2 ) {
            echo "yes"."\n";
        } else {
            echo "no"."\n";
        }
    }
