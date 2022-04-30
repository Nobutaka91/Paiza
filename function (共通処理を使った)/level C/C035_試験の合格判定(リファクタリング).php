<?php
// 関数内のifをできるだけ省略した↓
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
        $successfulCandidates  += isCheckSuccessfulCandidatesSciencesOrHumanities($score);
    }
    return $successfulCandidates;
}

function isCheckTotalScore($score)
{
    return $score["totalScore"] >= 350;
}

function isCheckScoreOf2Subjects($score1, $score2)
{
    return $score1 + $score2 >= 160;
}

function isCheckSciencesSpecialism($score)
{
    return $score["classData"] === "s";
}

function isCheckHumanitiesSpecialism($score)
{
    return $score["classData"] === "l";
}

function isCheckSuccessfulCandidatesSciencesOrHumanities($score)
{
    if (isCheckSciencesSpecialism($score) && isCheckScoreOf2Subjects($score["mathematics"], $score["science"])) return 1;
    if (isCheckHumanitiesSpecialism($score) && isCheckScoreOf2Subjects($score["linguistics"], $score["historicalGeography"])) return 1;
}
