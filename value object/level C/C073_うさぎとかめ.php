<?php
$runningDistance = trim(fgets(STDIN));
[$rabbitTimeOf1km, $rabbitKeepRunningDistance, $rabbitBreakTime] = explode(" ", trim(fgets(STDIN)));
$kameTimeOf1km = trim(fgets(STDIN));

$speed = new Speed(new Conditions($rabbitTimeOf1km), new Conditions($kameTimeOf1km));
$road = new Road(new Conditions($runningDistance), new Conditions($rabbitKeepRunningDistance));
$rabbit = new Rabbit($speed, new Conditions($rabbitBreakTime));
$kame = new Kame($speed);
$find = new WinnerChecker($road, $rabbit, $kame);
echo $find->outputWinner();


final class Conditions
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1 || 1000 < $value) {
            throw new Exception("値が制御範囲外です");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

final class Speed
{
    private $rabbitTimeOf1km;
    private $kameTimeOf1km;

    public function __construct(Conditions $rabbitTimeOf1km, Conditions $kameTimeOf1km)
    {
        if ($kameTimeOf1km->value() < $rabbitTimeOf1km->value()) {
            throw new Exception("値が制御範囲外です");
        }
        $this->rabbitTimeOf1km = $rabbitTimeOf1km;
        $this->kameTimeOf1km = $kameTimeOf1km;
    }

    public function rabbitTimeOf1km(): Conditions
    {
        return $this->rabbitTimeOf1km;
    }

    public function kameTimeOf1km(): Conditions
    {
        return $this->kameTimeOf1km;
    }
}

final class Road
{
    private $runningDistance;
    private $rabbitKeepRunningDistance;

    public function __construct(Conditions $runningDistance, Conditions $rabbitKeepRunningDistance)
    {
        if ($runningDistance->value() < $rabbitKeepRunningDistance->value()) {
            throw new Exception("値が制御範囲外です");
        }
        $this->runningDistance = $runningDistance;
        $this->rabbitKeepRunningDistance = $rabbitKeepRunningDistance;
    }

    public function runningDistance(): Conditions
    {
        return $this->runningDistance;
    }

    public function rabbitKeepRunningDistance(): Conditions
    {
        return $this->rabbitKeepRunningDistance;
    }
}

class Rabbit
{
    const WINNER_USAGI = "USAGI";
    const RABBIT_BREAK_TIME_COUNT_MINUS_NUM = 1;

    private $speed;
    private $rabbitBreakTime;

    public function __construct(Speed $speed, Conditions $rabbitBreakTime)
    {
        $this->speed = $speed;
        $this->rabbitBreakTime = $rabbitBreakTime;
    }

    public function findRabbitTime(Road $road): int
    {
        $rabbitRunningHour = $road->runningDistance()->value() * $this->speed->rabbitTimeOf1km()->value();
        $rabbitBreakTimeHour = (ceil($road->runningDistance()->value() / $road->rabbitKeepRunningDistance()->value()) - self::RABBIT_BREAK_TIME_COUNT_MINUS_NUM) * $this->rabbitBreakTime->value();
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

    public function __construct(Speed $speed)
    {
        $this->speed = $speed;
    }

    public function findKameTime(Road $road): int
    {
        $kameHourSum = $road->runningDistance()->value() * $this->speed->kameTimeOf1km()->value();
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
