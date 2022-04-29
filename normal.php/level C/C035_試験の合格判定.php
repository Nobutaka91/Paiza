<?php

$applicants = rtrim(fgets(STDIN)); //受験者の総数
$successfulCandidates = 0; //2段階選抜を突破した人数

for ($i = 0; $i < $applicants; $i++) {
    $scoreData = explode(" ", rtrim(fgets(STDIN))); //文理データと各科目の点数
    $totalScore = array_sum($scoreData); //全科目の合計点
    $humanitiesAndSciences = $scoreData[0]; //文系か理系どちらか
    $EnglishScore = $scoreData[1]; //英語の得点
    $mathematics = $scoreData[2]; //数学の得点
    $science = $scoreData[3]; //理科の得点
    $linguistics = $scoreData[4]; //国語の得点
    $historicalGeography = $scoreData[5]; //地理の得点
    if ($totalScore >= 350) {
        if ($humanitiesAndSciences === "s") {
            if ($mathematics + $science >= 160) {
                $successfulCandidates++;
            }
        } elseif ($humanitiesAndSciences === "l") {
            if ($linguistics + $historicalGeography >= 160) {
                $successfulCandidates++;
            }
        }
    }
}
echo $successfulCandidates;
