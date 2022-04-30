<?php
    $entranceExamPersonNum = trim(fgets(STDIN));

    for ($i = 0; $i < $entranceExamPersonNum; $i++ ) {
       [$humanities_and_sciences, $englishScore, $mathScore, $scienceScore, $japaneseScore, $geographyAndHistoryScore] = explode(" ", trim(fgets(STDIN)));

       $scoreList[] = [
         "property" => $humanities_and_sciences,
         "e" => $englishScore,
         "m" => $mathScore,
         "s" => $scienceScore,
         "j" => $japaneseScore,
         "g" => $geographyAndHistoryScore
       ];
    }

    $passing = [];
    foreach ( $scoreList as $score ) {
     if( array_sum($score) >= 350 ) {
        if( $score["property"] == "s" && $score["m"] + $score["s"] >= 160 ) {
            $passing[] = 1;
        } elseif ( $score["property"] === "l" && $score["j"] + $score["g"] >= 160 ) {
            $passing[] = 1;
        }
     }
    }
    echo array_sum($passing);
