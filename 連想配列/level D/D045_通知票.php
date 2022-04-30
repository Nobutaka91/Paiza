<?php

    $rank = trim(fgets(STDIN));

    $rankList = [
        "1" => "E",
        "2" => "D",
        "3" => "C",
        "4" => "B",
        "5" => "A"
        ];

    echo $rankList[$rank];
