<?php

    [$constructionPositionX, $constructionPositionY, $noizeSizeR]  = explode(" ", trim(fgets(STDIN)));

    $shadeNumber = trim(fgets(STDIN));

    for ($i=0; $i < $shadeNumber; $i++) {
        [$shadePositionX, $shadePositionY] = explode(" ", trim(fgets(STDIN)));

        $rangeDifferenceX = $shadePositionX - $constructionPositionX;
        $rangeDifferenceY = $shadePositionY - $constructionPositionY;
        $result = checkReadingPossibility($rangeDifferenceX, $rangeDifferenceY, $noizeSizeR);
        echo $result."\n";
    }

    function checkReadingPossibility($rangeDifferenceX, $rangeDifferenceY, $noizeSizeR)
    {
        return ($rangeDifferenceX**2 + $rangeDifferenceY**2 >= $noizeSizeR**2) ? "silent" : "noisy";
    }
