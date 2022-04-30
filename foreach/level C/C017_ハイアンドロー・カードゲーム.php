<?php

    $parentCardNumberList = explode(" " , rtrim(fgets(STDIN)));
    $n = rtrim(fgets(STDIN));

    for( $i = 0; $i < $n; $i++ ) {
        $childlenCardList[] = explode(" " , rtrim(fgets(STDIN)));
    }

    foreach ($childlenCardList as $childCardList) {
        if($parentCardNumberList[0] > $childCardList[0]) {
            echo "High"."\n";
        }elseif ($parentCardNumberList[0] === $childCardList[0]) {
            if($parentCardNumberList[1] < $childCardList[1]) {
                echo "High"."\n";
            } else {
                echo "Low"."\n";
            }
        } else {
            echo "Low"."\n";
        }
    }
