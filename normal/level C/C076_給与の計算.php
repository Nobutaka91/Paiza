<?php
    
    [$lowWage,$nomalWage,$highWage] = explode(" ", trim(fgets(STDIN)));
    
    $workdayNum = trim(fgets(STDIN));
    
    $earlymorningWageList = array_fill(0,9,$highWage);
    $daytimeWageList = array_fill(9,8,$lowWage);
    $nightWageList = array_fill(17,5,$nomalWage);
    $midnightWageList = array_fill(22,3,$highWage);
    
    $hourlyWageList = array_merge($earlymorningWageList, $daytimeWageList, $nightWageList, $midnightWageList);
    
    $totalWage = []; 
    for($i = 0; $i < $workdayNum; $i++) {
        [$begin, $finish] = explode(" ", trim(fgets(STDIN)));
        for($j = $begin; $j < $finish; $j++) {
            $totalWage[] = $hourlyWageList[$j];        
        }
    }
    $totalWage = array_sum($totalWage);
    echo $totalWage;
