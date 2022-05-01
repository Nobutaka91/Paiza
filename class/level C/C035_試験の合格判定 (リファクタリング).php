<?php

##################################################################
# クラス名は、持っているプロパティとメソッドが想像できるよう名前に変える
# SuccessfulCandidatesList　➞　SuccessfulCandidatesChecker
##################################################################

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

        public function __construct($totalScore, $course, $scienceSubjects, $humanitiesSubjects)
        {
            $this->totalScore = $totalScore;
            $this->course = $course;
            $this->scienceSubjects = $scienceSubjects;
            $this->humanitiesSubjects = $humanitiesSubjects;
        }

        public function classifySuccessfulCandidates()
        {
            if($this->totalScore >= self::FIRST_EXAM_PASSINGSCORES) {
                if ($this->course == self::SCIENCE_COURSE && $this->scienceSubjects >= self::SECOND_EXAM_PASSINGSCORES) return 1;
                if ($this->course == self::HUMANITY_COURSE && $this->humanitiesSubjects >= self::SECOND_EXAM_PASSINGSCORES) return 1;
            }
        }
    }
