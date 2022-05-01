<?php
//「インターフェース」、「クラス」、「それ以外の処理」の順番でコード書く

interface Year
{
   public function findGapYear(): int;  //Year型クラスなら「public function findGapYear(): int;」を持ってないとエラー
}
   
class SubtractionYear implements Year//Year型のSubtractionYearクラスという意味
{
    private $year1;
    private $year2;
    
    public function __construct($inputYears)
    {
        $this->year1 = $inputYears[0];
        $this->year2 = $inputYears[1];
    }
    
    public function findGapYear(): int
    {
        return $this->year2 - $this->year1;
    }
    
}
$input = fgets(STDIN);
$inputYears = explode(" ",$input);
$subtractionYear = new SubtractionYear($inputYears);
echo $subtractionYear->findGapYear();
