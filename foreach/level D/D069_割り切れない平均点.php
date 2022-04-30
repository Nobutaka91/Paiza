<?php

    $scoreList = explode(" ", (fgets(STDIN)));

    $total = 0;
    foreach ($scoreList as $score ) {
        $total += $score;
    }

    $average = $total / 7;
    $result = round($average, 1);
    echo number_format($result, 1);
