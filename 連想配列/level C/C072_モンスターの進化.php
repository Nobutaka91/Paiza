<?php

    [ $ATK, $DEF, $AGI ] = explode(" ", trim(fgets(STDIN)));

    $monsterNum = trim(fgets(STDIN));

    for($i = 0; $i < $monsterNum; $i++ ) {
    [$monsterName, $minATK, $maxATK, $minDEF, $maxDEF, $minAGI, $maxAGI] = explode(" ", trim(fgets(STDIN)));

       $statusList[] = [
           "monsterName" => $monsterName,
           "minATK" => $minATK,
           "maxATK" => $maxATK,
           "minDEF" => $minDEF,
           "maxDEF" => $maxDEF,
           "minAGI" => $minAGI,
           "maxAGI" => $maxAGI
       ];

    }

    foreach ($statusList as $status) {
        if ($status["minATK"] <= $ATK && $ATK <= $status["maxATK"]) {
            if($status["minDFE"] <= $DEF && $DEF <= $status["maxDEF"]) {
                if($status["minAGI"] <= $AGI && $AGI <= $status["maxAGI"]) {
                    echo $status["monsterName"]."\n";
                    $evolutions ++;
                }
            }
        }
    }

    if ($evolutions == 0) {
        echo "no evolution";
    }




//別解

    [ $ATK, $DEF, $AGI ] = explode(" ", trim(fgets(STDIN)));
    
    $monsterNum = trim(fgets(STDIN));
    
    for($i = 0; $i < $monsterNum; $i++ ) {
    [$monsterName, $minATK, $maxATK, $minDEF, $maxDEF, $minAGI, $maxAGI] = explode(" ", trim(fgets(STDIN)));
    
       $statusList[] = [
           "monsterName" => $monsterName,
           "minATK" => $minATK,
           "maxATK" => $maxATK,
           "minDEF" => $minDEF,
           "maxDEF" => $maxDEF,
           "minAGI" => $minAGI,
           "maxAGI" => $maxAGI
       ];
    }

    foreach ($statusList as $status) {
        if ($status["minATK"] <= $ATK && $ATK <= $status["maxATK"]) {
            if($status["minDFE"] <= $DEF && $DEF <= $status["maxDEF"]) {
                if($status["minAGI"] <= $AGI && $AGI <= $status["maxAGI"]) {
                    echo $status["monsterName"]."\n";
                    $evolutions ++;
                }
            }
        }
    }

    if ($evolutions == 0) {
        echo "no evolution";
    }
?>