<?php
// 全科目の合計得点が 350 点以上
// 理系の受験者の場合は理系 2 科目 (数学、理科) の合計得点が 160 点以上
// 文系の受験者の場合は文系 2 科目 (国語、地理歴史) の合計得点が 160 点以上
// 受験者それぞれの各科目の点数が入力されるので、何人2段階選抜を通過できるかを求める

    $applicants = rtrim(fgets(STDIN));

    for($i = 0; $i < $applicants; $i ++) {
        $scoreDataList[] = explode(" " , rtrim(fgets(STDIN)));
    }

    foreach($scoreDataList as $scoreData ) {
        $totalScore = array_sum($scoreData);
        $course = $scoreData[0];
        $EnglishScore = $scoreData[1];
        $mathematics = $scoreData[2];
        $science = $scoreData[3];
        $scienceSubjects = $mathematics + $science;
        $japanese = $scoreData[4];
        $historicalGeography = $scoreData[5];
        $humanitiesSubjects = $japanese + $historicalGeography;

        $SuccessfulCandidatesChecker = new SuccessfulCandidatesChecker($totalScore, $course, $scienceSubjects, $humanitiesSubjects);
        $outputList += $SuccessfulCandidatesChecker->classifySuccessfulCandidates();
    }

    echo $outputList;

    class SuccessfulCandidatesChecker
    {
        const FIRST_EXAM_PASSINGSCORES = 350;
        const SECOND_EXAM_PASSINGSCORES = 160;
        const HUMANITY_COURSE = "l";
        const SCIENCE_COURSE = "s";

        private $totalScore;
        private $course;
        private $scienceSubjects;
        private $humanitiesSubjects;

        public function __construct(int $totalScore, string $course, int $scienceSubjects, int $humanitiesSubjects)
        {
            $this->totalScore = $totalScore;
            $this->course = $course;
            $this->scienceSubjects = $scienceSubjects;
            $this->humanitiesSubjects = $humanitiesSubjects;
        }

        public function classifySuccessfulCandidates() : int
        {
            if($this->totalScore >= self::FIRST_EXAM_PASSINGSCORES) {
                if ($this->course == self::SCIENCE_COURSE && $this->scienceSubjects >= self::SECOND_EXAM_PASSINGSCORES) return 1;
                if ($this->course == self::HUMANITY_COURSE && $this->humanitiesSubjects >= self::SECOND_EXAM_PASSINGSCORES) return 1;
            }
        }
    }
