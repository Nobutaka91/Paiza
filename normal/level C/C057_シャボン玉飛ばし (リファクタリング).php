<?php

    [$maxTime, $currentPositionX, $currentPositionY] = explode(" ", trim(fgets(STDIN))); //timeの最大値、現在位置x、現在位置y

    $maxPositionX = $currentPositionX; //$currentXを暫定でxの最大値とする

    for($time = 1; $time <= $maxTime; $time++) {
        [$movingDistanceX , $movingDistanceY] = explode(" ", trim(fgets(STDIN))); //x,yの移動距離

        $updatedPositionY = $currentPositionY + $movingDistanceY;

        if($updatedPositionY <= 0) {
            break;
        } else {
            $updatedPositionX = $currentPositionX + $movingDistanceX;

            if($maxPositionX < $updatedPositionX) {
                $maxPositionX = $updatedPositionX;
            }
        }
    }

    echo $maxPositionX;
