##########################################################
[方針]
ScoreDataListクラスを追加する。
そうすることでSuccessfulCandidatesCheckerクラスの定数が減り、
メソッドもすっきりした。
##########################################################


<?php

$applicants = rtrim(fgets(STDIN));

$successfulCandidates = 0;
for ($i = 0; $i < $applicants; $i++) {
    $scoreData = explode(" ", rtrim(fgets(STDIN)));

    $scoreDataList  = new ScoreDataList($scoreData);
    $totalScore = $scoreDataList->totalScore();
    $subTotalScore = $scoreDataList->subTotalScore();
    // $course = $scoreDataList->course();
    // $scienceSubjects = $scoreDataList->scienceSubjects();
    // $humanitiesSubjects = $scoreDataList->humanitiesSubjects();

    $successfulCandidatesChecker = new SuccessfulCandidatesChecker($totalScore, $subTotalScore);
    $successfulCandidates += $successfulCandidatesChecker->classifySuccessfulCandidates();
}

echo $successfulCandidates;

class ScoreDataList
{
    const SCIENCE_COURSE = "s";
    const HUMANITY_COURSE = "l";

    private $scoreData;

    public function __construct($scoreData)
    {
        $this->scoreData = $scoreData;
    }

    public function totalScore(): int
    {
        return array_sum($this->scoreData);
    }

    public function subTotalScore(): int
    {
        $subjects = $this->scoreData[0];
        $mathematics = $this->scoreData[2];
        $science = $this->scoreData[3];
        $japanese = $this->scoreData[4];
        $historicalGeography = $this->scoreData[5];

        if ($subjects == self::SCIENCE_COURSE) return $mathematics + $science;
        if ($subjects == self::HUMANITY_COURSE) return $japanese + $historicalGeography;
    }
}

class SuccessfulCandidatesChecker
{
    const FIRST_EXAM_PASSINGSCORES = 350;
    const SECOND_EXAM_PASSINGSCORES = 160;

    public function __construct(int $totalScore, int $subTotalScore)
    {
        $this->totalScore = $totalScore;
        $this->subTotalScore = $subTotalScore;
    }

    public function classifySuccessfulCandidates()
    {
        if ($this->totalScore >= self::FIRST_EXAM_PASSINGSCORES && $this->subTotalScore >= self::SECOND_EXAM_PASSINGSCORES) return 1;
    }
}
