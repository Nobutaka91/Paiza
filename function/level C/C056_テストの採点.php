<?php

    [$studentsNumber, $passingPoint] = explode(" ", trim(fgets(STDIN)));

    for($i=1; $i <= $studentsNumber; $i++) {
        [$score, $absenceNumber] = explode(" ", trim(fgets(STDIN)));

        $successfulAplicant = checkSuccessfulAplicant($score, $absenceNumber, $passingPoint, $i);
        echo $successfulAplicant;
    }

    function checkSuccessfulAplicant($score, $absenceNumber, $passingPoint, $i)
    {
        if (abs($score - $absenceNumber*5) >= $passingPoint) {
            return $i."\n";
        }
    }
