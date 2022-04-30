<?php

    $scoring_list = str_split(trim(fgets(STDIN)));
    $requiredCorrectAnswerNumber = trim(fgets(STDIN));

    $right = 0;
    $wrong = 0;
    foreach ($scoring_list as $scoring) {
        if ($scoring == "R") $right++;
        elseif ($scoring == "W") $wrong++;
    }

    if ($right >= $requiredCorrectAnswerNumber) {
        echo "Yes";
    } else {
        echo "No";
    }
