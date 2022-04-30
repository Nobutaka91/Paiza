<?php
// 全科目の合計得点が 350 点以上
// 理系の受験者の場合は理系 2 科目 (数学、理科) の合計得点が 160 点以上
// 文系の受験者の場合は文系 2 科目 (国語、地理歴史) の合計得点が 160 点以上
// 受験者それぞれの各科目の点数が入力されるので、何人2段階選抜を通過できるかを求めてください。

$applicants = trim(fgets(STDIN));

for ($i = 0; $i < $applicants; $i++) {
    $scoreData = explode(" ", trim(fgets(STDIN)));
    $totalScore = array_sum($scoreData);
    $humanitiesOrSciences = $scoreData[0];
    $English = $scoreData[1];
    $mathematics = $scoreData[2];
    $science = $scoreData[3];
    $linguistics = $scoreData[4];
    $historicalGeography = $scoreData[5];

    $scoreList[] = [
        "totalScore" => $totalScore,
        "classData" => $humanitiesOrSciences,
        "English" => $English,
        "mathematics" => $mathematics,
        "science" => $science,
        "linguistics" => $linguistics,
        "historicalGeography" => $historicalGeography
    ];
}

$totalSuccessfulCandidates = 0;

foreach ($scoreList as $score) {

    $totalSuccessfulCandidates += isCheckTotalSuccessfulCandidates($score);
}

echo $totalSuccessfulCandidates;

function isCheckTotalSuccessfulCandidates($score)
{
    $successfulCandidates = 0;

    if (isCheckTotalScore($score)) {

        $successfulCandidates  += isCheckSuccessfulCandidatesOfSciences($score);
        $successfulCandidates  += isCheckSuccessfulCandidatesOfHumanities($score);
    }

    return $successfulCandidates;
}

function isCheckTotalScore($score)
{
    if ($score["totalScore"] >= 350) return true;
}

function isCheckSuccessfulCandidatesOfSciences($score)
{
    if (isCheckSciencesSpecialism($score) && isCheckTotalScoreOfSciencesSpecialism($score)) return 1;
}

function isCheckSuccessfulCandidatesOfHumanities($score)
{
    if (isCheckHumanitiesSpecialism($score) && isCheckTotalScoreOfHumanitiesSpecialism($score)) return 1;
}

function isCheckSciencesSpecialism($score)
{
    if ($score["classData"] === "s") return true;
}

function isCheckHumanitiesSpecialism($score)
{
    if ($score["classData"] === "l") return true;
}

function isCheckTotalScoreOfSciencesSpecialism($score)
{
    if ($score["mathematics"] + $score["science"] >= 160) return true;
}

function isCheckTotalScoreOfHumanitiesSpecialism($score)
{
    if ($score["linguistics"] + $score["historicalGeography"] >= 160) return true;
}


