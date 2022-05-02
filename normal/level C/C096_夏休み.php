<?php

    $numberOfFamilyMembers = trim(fgets(STDIN));
    
    $holidayPeriodList = [];
    for ($i = 0; $i < $numberOfFamilyMembers; $i++) {
        [$firstDay, $lastDay] = explode(" ", trim(fgets(STDIN)));
        
        for ($j = (int) $firstDay; $j <= (int) $lastDay; $j++) {
            $holidayPeriodList[] = $j;
        }
    }
    $countingHoliday = array_count_values($holidayPeriodList);
    
    if (max($countingHoliday) == $numberOfFamilyMembers) {
        echo "OK";
    } else {
        echo "NG";
    }
