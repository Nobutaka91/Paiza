<?php

    $input_line = trim(fgets(STDIN));
    $array = explode(" ", $input_line);
    $distance = 0;

    $latList[] = $lat = $array[1];
    $lonList[] = $lon = $array[2];
    for($i = 0; $i < $array[0]; $i++) {
        $inputs = trim(fgets(STDIN));

        $arr = explode(" ", $inputs);
        $lat += $arr[0];
        $lon += $arr[1];

        $latList[] = $lat;
        $lonList[] = $lon;

        if($lon <= 0) {
            break;
        }
    }
    echo max($latList);
