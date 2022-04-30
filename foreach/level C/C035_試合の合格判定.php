<?php

$applicants = rtrim(fgets(STDIN));
$successfulCandidates = 0;

for ($i = 0; $i < $applicants; $i++) {
    $scoreDataList[] = explode(" ", rtrim(fgets(STDIN)));
}

foreach ($scoreDataList as $scoreData) {
    $totalScore = array_sum($scoreData);
    $humanitiesOrSciences = $scoreData[0];
    $EnglishScore = $scoreData[1];
    $mathematics = $scoreData[2];
    $science = $scoreData[3];
    $linguistics = $scoreData[4];
    $historicalGeography = $scoreData[5];
    if ($totalScore >= 350) {
        if ($humanitiesOrSciences === "s") {
            if ($mathematics + $science >= 160) {
                $successfulCandidates++;
            }
        } elseif ($humanitiesOrSciences === "l") {
            if ($linguistics + $historicalGeography >= 160) {
                $successfulCandidates++;
            }
        }
    }
}
echo $successfulCandidates;
