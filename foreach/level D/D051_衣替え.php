<?php

    $seasonWearList = explode(" " ,rtrim(fgets(STDIN)));

    $total = 0 ;
    foreach ($seasonWearList as $seasonWear) {
        if ($seasonWear == "W") {
            $total ++ ;
        }
    }
        if ($total >= 5) {
            echo "OK" ;
        } else {
            echo "NG" ;
        }
