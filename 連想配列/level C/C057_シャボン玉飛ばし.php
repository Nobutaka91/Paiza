<?php

    [$time, $initialX, $initialY] = explode(" ", trim(fgets(STDIN)));

    $transitionList = ["X" => $initialX, "Y" => $initialY];
    $positionXList[] = $initialX;

    for($i = 1; $i <= $time; $i++) {
        [$movementX , $movementY] = explode(" ", trim(fgets(STDIN))); //x,yの移動距離
        $transitionList["X"] += $movementX;
        $transitionList["Y"] += $movementY;

        $positionXList[] = $transitionList["X"];

        if($transitionList["Y"] <= 0) {
            break;
        }
    }

    echo max($positionXList);
