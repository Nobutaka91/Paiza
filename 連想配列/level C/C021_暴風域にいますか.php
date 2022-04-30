<?php

    [$cycloneX, $cycloneY,$radiusSmall,$radiusLarge] = explode(" ", trim(fgets(STDIN)));

    $man = trim(fgets(STDIN));

    for($i = 0; $i < $man; $i++) {
        [$manPositionX, $manPositionY] = explode(" ", trim(fgets(STDIN)));

        $manPositionList[] = [
           "X" => $manPositionX,
           "Y" => $manPositionY
        ];
    }

    foreach($manPositionList as $manPosition) {
        $differenceX = $manPosition["X"] - $cycloneX;
        $differenceY = $manPosition["Y"] - $cycloneY;

        $difference = $differenceX**2 + $differenceY**2;

        if ($radiusSmall**2 <= $difference && $difference <= $radiusLarge**2 ) {
            echo "yes";
        } else {
            echo "no";
        }
            echo "\n";
    }
