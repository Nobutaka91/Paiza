<?php

    $logTotal = trim(fgets(STDIN));
    $stopPoint = [1];
    $count = 0;
    $result = 0;
    for ($i = 0; $i < $logTotal; $i++) {
        $input_line = trim(fgets(STDIN));
        $stopPoint[] = $input_line;
        $result += checkMovingFloor($stopPoint, $i);
     }
        echo $result;

    function checkMovingFloor($stopPoint, $i)
    {
        return abs($stopPoint[$i + 1] - $stopPoint[$i]);
    }



