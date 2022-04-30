<?php

    [$constructionPositionX, $constructionPositionY, $radius] = explode(" ", trim(fgets(STDIN)));
    $treeNumber = trim(fgets(STDIN));

    for ($i = 0; $i < $treeNumber; $i++) {
        [$treePositionX, $treePositionY] = explode(" ", trim(fgets(STDIN)));

        $treePositionList[] =  [
            "X" => $treePositionX,
            "Y" => $treePositionY
        ];
    }

    foreach ($treePositionList as $treePosition) {
        $differenceX = $treePosition["X"] - $constructionPositionX;
        $differenceY = $treePosition["Y"] - $constructionPositionY;

        if ($differenceX**2 + $differenceY**2 >= $radius**2 ) {
            echo "silent";
        } else {
            echo "noisy";
        }
            echo "\n";
    }
