<?php
//SumクラスとAvgクラスにインターフェースを実装した
interface Calcurate
{
     public function calcurate();
}

class Score
{
    private $scoreList;
    private $passingScore;
    
    public function __construct(array $scoreList, int $passingScore)
    {
        $this->scoreList    = $scoreList;
        $this->passingScore = $passingScore;
    }
    
    public function scoreList() : array
    {
        return $this->scoreList;
    }
    
    public function passingScore() : int
    {
        return $this->passingScore;
    }
}

class Sum implements Calcurate
{
    private $score;
    
    public function __construct(Score $score)
    {
        $this->score  = $score;
    }
    
    public function calcurate() : int
    {
        return array_sum($this->score->scoreList());
    }
}


class Avg implements Calcurate
{
    const NUMBER_OF_SUBJECTS = 7;
    
    private $sum;
    
    public function __construct(Sum $sum)
    {
        $this->sum  = $sum;
    }
    
    public function calcurate() : int
    {
       return $this->sum->calcurate() / self::NUMBER_OF_SUBJECTS;
    }
}

class PassingExamChecker 
{
    const PASS    = 'pass';
    const FAILURE = 'failure';
    
    private $score;
    private $avg;
    
    public function __construct(Score $score, Avg $avg)
    {
        $this->score = $score;
        $this->avg   = $avg;
    }
    
    public function judgePassExam() : string
    {
        return ($this->avg->calcurate() >= $this->score->passingScore()) 
            ? self::PASS 
            : self::FAILURE;   
    }
}

$scoreList = explode(" " ,rtrim(fgets(STDIN)));
$passingScore = trim(fgets(STDIN));
$score= new Score($scoreList, $passingScore);
$sum = new Sum($score);
$avg = new Avg($sum);
$passingExamChecker = new PassingExamChecker($score, $avg);
echo $passingExamChecker->judgePassExam();
