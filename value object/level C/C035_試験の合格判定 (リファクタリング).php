##################################################
# $totalscoreの計算を「ScoreDataList」クラスでやった
##################################################

<?php
$applicants = rtrim(fgets(STDIN));

$successfulCandidates = 0;
for ($i = 0; $i < $applicants; $i++) {
    [$subject, $english, $mathematics, $science, $japanese, $historicalGeography] = explode(" ", rtrim(fgets(STDIN)));
    $subject = new Subjects($subject);
    $english = new Score($english);
    $mathematics = new Score($mathematics);
    $science = new Score($science);
    $japanese = new Score($japanese);
    $historicalGeography = new Score($historicalGeography);

    $scoreDataList  = new ScoreDataList($subject, $english, $mathematics, $science, $japanese, $historicalGeography);

    $successfulCandidatesChecker = new SuccessfulCandidatesChecker($scoreDataList);
    $successfulCandidates += $successfulCandidatesChecker->determineSuccessfulCandidates();
}

echo $successfulCandidates;

class Subjects
{
    const SCIENCE_COURSE = "s";
    const HUMANITY_COURSE = "l";

    private $value;

    public function __construct(string $value)
    {
        if ($value != self::SCIENCE_COURSE && $value != self::HUMANITY_COURSE) {
            throw new Exception("文系か理系の受験者が対象の試験です");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}

class Score
{
    const MIN_SCORE = 0;
    const MAX_SCORE = 100;

    private $value;

    public function __construct(string $value)
    {
        if ($value < self::MIN_SCORE || self::MAX_SCORE < $value) {
            throw new Exception("試験方式は1科目100点の500点満点です");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

class ScoreDataList
{
    const SCIENCE_COURSE = "s";
    const HUMANITY_COURSE = "l";

    private $subject;
    private $english;
    private $mathematics;
    private $science;
    private $japanese;
    private $historicalGeography;

    public function __construct(
        Subjects $subject,
        Score $english,
        Score $mathematics,
        Score $science,
        Score $japanese,
        Score $historicalGeography
    ) {
        $this->subject = $subject;
        $this->english = $english;
        $this->mathematics = $mathematics;
        $this->science = $science;
        $this->japanese = $japanese;
        $this->historicalGeography = $historicalGeography;
    }

    /**
     *全5科目の合計点を求める 
     */
    public function totalScore(): int
    {
        $totalscore = $this->english->value() + $this->mathematics->value()
            + $this->science->value() + $this->japanese->value() + $this->historicalGeography->value();
        return $totalscore;
    }

    /**
     *理系生なら理系2科目(数学と理科)、文系生なら文系2科目(国語と地理歴史)の合計点を求める 
     */
    public function subTotalScore(): int
    {
        if ($this->subject->value() == self::SCIENCE_COURSE)  return $this->mathematics->value() + $this->science->value();
        if ($this->subject->value() == self::HUMANITY_COURSE) return $this->japanese->value() + $this->historicalGeography->value();
    }
}

class SuccessfulCandidatesChecker
{
    const FIRST_EXAM_PASSINGSCORES  = 350;
    const SECOND_EXAM_PASSINGSCORES = 160;

    private $scoreDataList;

    public function __construct(ScoreDataList $scoreDataList)
    {
        $this->scoreDataList = $scoreDataList;
    }

    /**
     * 2段階選抜を通過した受験生の人数を求める
     */
    public function determineSuccessfulCandidates()
    {
        if (
            $this->scoreDataList->totalScore() >= self::FIRST_EXAM_PASSINGSCORES
            && $this->scoreDataList->subTotalScore() >= self::SECOND_EXAM_PASSINGSCORES
        ) return 1;
    }
}
