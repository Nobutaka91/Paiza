<?php

    $distance_km = trim(fgets(STDIN));
    [$rabbitRunningTime_perKm, $breakPoint, $breakTime_min] = explode(" ", trim(fgets(STDIN)));

    $rabitTotalRunningTime = $rabbitRunningTime_perKm * $distance_km;
    $rabbitTotalBreakTIme = (ceil($distance_km / $breakPoint) - 1) * $breakTime_min;
    $rabbitCompletionTime = $rabitTotalRunningTime + $rabbitTotalBreakTIme;
    $turtleRunningTime_perKm = trim(fgets(STDIN));
    $turtleCompletionTime = $turtleRunningTime_perKm * $distance_km;

    if ($rabbitCompletionTime < $turtleCompletionTime) {
        echo "USAGI";
    } elseif ($rabbitCompletionTime > $turtleCompletionTime) {
        echo "KAME";
    } else {
        echo "DRAW";
    }
