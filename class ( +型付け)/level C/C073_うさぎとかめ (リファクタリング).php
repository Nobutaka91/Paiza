################################################################
# うさぎクラス,かめクラス,勝者を決めるクラス,に分けることで
# うさぎとかめ以外の動物と競争させることになっても対応できるようにした
################################################################


<?php

$runningDistance = trim(fgets(STDIN));
[$rabbitTimeOf1km, $rabbitKeepRunningDistance, $rabbitBreakTime] = explode(" ", trim(fgets(STDIN)));
$kameTimeOf1km = trim(fgets(STDIN));

$road = new Road($runningDistance);
$rabbit = new Rabbit($rabbitTimeOf1km, $rabbitKeepRunningDistance, $rabbitBreakTime);
$kame = new Kame($kameTimeOf1km);
$find = new WinnerChecker($road, $rabbit, $kame);
echo $find->outputWinner();

class Road
{
    private $runningDistance;

    public function __construct(int $runningDistance)
    {
        $this->runningDistance = $runningDistance;
    }

    public function outputRunningDistance(): int
    {
        return $this->runningDistance;
    }
}

class Rabbit
{
    const WINNER_USAGI = "USAGI";
    const RABBIT_BREAK_TIME_COUNT_MINUS_NUM = 1;

    private $rabbitTimeOf1km;
    private $rabbitKeepRunningDistance;
    private $rabbitBreakTime;

    public function __construct(int $rabbitTimeOf1km, int $rabbitKeepRunningDistance, int $rabbitBreakTime)
    {
        $this->rabbitTimeOf1km = $rabbitTimeOf1km;
        $this->rabbitKeepRunningDistance = $rabbitKeepRunningDistance;
        $this->rabbitBreakTime = $rabbitBreakTime;
    }

    public function findRabbitTime(Road $road): int
    {
        $rabbitRunningHour = $road->outputRunningDistance() * $this->rabbitTimeOf1km;
        $rabbitBreakTimeHour = (ceil($road->outputRunningDistance() / $this->rabbitKeepRunningDistance) - self::RABBIT_BREAK_TIME_COUNT_MINUS_NUM) * $this->rabbitBreakTime;
        $rabbitHourSum = $rabbitRunningHour + $rabbitBreakTimeHour;
        return $rabbitHourSum;
    }

    public function winnerRabbit(): string
    {
        return self::WINNER_USAGI;
    }
}

class Kame
{
    const WINNER_KAME = "KAME";
    private $kameTimeOf1km;

    public function __construct(int $kameTimeOf1km)
    {
        $this->kameTimeOf1km = $kameTimeOf1km;
    }

    public function findKameTime(Road $road): int
    {
        $kameHourSum = $road->outputRunningDistance() * $this->kameTimeOf1km;
        return $kameHourSum;
    }

    public function winnerKame(): string
    {
        return self::WINNER_KAME;
    }
}

class WinnerChecker
{
    const NO_WINNER_DRAW = "DRAW";

    private $road;
    private $rabbit;
    private $kame;

    public function __construct(Road $road, Rabbit $rabbit, Kame $kame)
    {
        $this->road = $road;
        $this->rabbit = $rabbit;
        $this->kame = $kame;
    }

    public function outputWinner(): string
    {
        $rabbitHourSum = $this->rabbit->findRabbitTime($this->road);
        $kameHourSum = $this->kame->findKameTime($this->road);

        if ($rabbitHourSum < $kameHourSum) return $this->rabbit->winnerRabbit();
        if ($kameHourSum < $rabbitHourSum) return $this->kame->winnerKame();
        return self::NO_WINNER_DRAW;
    }
}
