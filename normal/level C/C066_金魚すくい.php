<?php

    [$numberOfGoldfish, $totalScooping, $durability] = explode(" ", trim(fgets(STDIN)));

    $numberOfCatch = 0;

    for ($i = 0; $i < $numberOfGoldfish; $i++) {
        $goldfishWeightList[] = trim(fgets(STDIN));
    }

    $num = 0;
    $remainingDurability = $durability;

    while ($totalScooping > 0) {

        $remainingDurability -= $goldfishWeightList[$num];
        if ($remainingDurability > 0) {
            $numberOfCatch ++;
            $num ++;
        } else {
            $remainingDurability = $durability;
            $totalScooping --;
        }

        if ($totalScooping < 0) {
            break;
        }
    }
    echo $numberOfCatch;
