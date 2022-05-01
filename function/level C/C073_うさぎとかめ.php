<?php

    $distance_km = trim(fgets(STDIN));
    [$rabbitRunningTime_perKm, $breakPoint, $breakTime_min] = explode(" ", trim(fgets(STDIN)));
    $turtleRunningTime_perKm = trim(fgets(STDIN));

    $turtleCompletionTime = calculateTurtleCompletionTime($turtleRunningTime_perKm, $distance_km);
    $rabbitCompletionTime = calculateRabbitCompletionTime($rabbitRunningTime_perKm, $distance_km, $breakPoint, $breakTime_min);
    $firstComer = verifyFirstComer($rabbitCompletionTime, $turtleCompletionTime);
    echo implode($firstComer);

    function calculateTurtleCompletionTime($turtleRunningTime_perKm, $distance_km)
    {
        return $turtleRunningTime_perKm * $distance_km;
    }

    function calculateRabbitCompletionTime($rabbitRunningTime_perKm, $distance_km, $breakPoint, $breakTime_min)
    {
        $rabitTotalRunningTime = $rabbitRunningTime_perKm * $distance_km;
        $rabbitTotalBreakTIme = (ceil($distance_km / $breakPoint) - 1) * $breakTime_min;
        return $rabitTotalRunningTime + $rabbitTotalBreakTIme;
    }

    function verifyFirstComer($rabbitCompletionTime, $turtleCompletionTime)
    {
        $firstComer = [];

        if($rabbitCompletionTime < $turtleCompletionTime) $firstComer[] = "USAGI";
        if($rabbitCompletionTime > $turtleCompletionTime) $firstComer[] = "KAME";
        if($rabbitCompletionTime == $turtleCompletionTime) $firstComer[] = "DRAW";

        return $firstComer;
    }
