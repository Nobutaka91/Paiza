
<?php
//「Runner」型のクラスは「name」メソッドを持っていないといけないという指定をしている

interface Runner
{
    public function name(): string;
}

class Road
{
    private $runningDistance;

    public function __construct(int $runningDistance)
    {
        $this->runningDistance = $runningDistance;
    }

    public function RunningDistance(): int
    {
        return $this->runningDistance;
    }
}

class Rabbit implements Runner
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
        $rabbitRunningHour = $road->RunningDistance() * $this->rabbitTimeOf1km;
        $rabbitBreakTimeHour = (ceil($road->RunningDistance() / $this->rabbitKeepRunningDistance) - self::RABBIT_BREAK_TIME_COUNT_MINUS_NUM) * $this->rabbitBreakTime;
        $rabbitHourSum = $rabbitRunningHour + $rabbitBreakTimeHour;
        return $rabbitHourSum;
    }

    public function name(): string
    {
        return self::WINNER_USAGI;
    }
}

class Kame implements Runner
{
    const WINNER_KAME = "KAME";
    private $kameTimeOf1km;

    public function __construct(int $kameTimeOf1km)
    {
        $this->kameTimeOf1km = $kameTimeOf1km;
    }

    public function findKameTime(Road $road): int
    {
        $kameHourSum = $road->RunningDistance() * $this->kameTimeOf1km;
        return $kameHourSum;
    }

    public function name(): string
    {
        return self::WINNER_KAME;
    }
}

//interfaceの実装にともない、「WinnerChecker」クラスの引数の「$rabbit」と「$kame」は「Runner」型で指定にしている。
class WinnerChecker
{
    const NO_WINNER_DRAW = "DRAW";

    private $road;
    private $rabbit;
    private $kame;
    public function __construct(Road $road, $rabbit, $kame)
    {
        $this->road = $road;
        $this->rabbit = $rabbit;
        $this->kame = $kame;
    }

    public function outputWinner(): string
    {
        $rabbitHourSum = $this->rabbit->findRabbitTime($this->road);
        $kameHourSum = $this->kame->findKameTime($this->road);

        if ($rabbitHourSum < $kameHourSum) return $this->rabbit->name();
        if ($kameHourSum < $rabbitHourSum) return $this->kame->name();
        return self::NO_WINNER_DRAW;
    }
}

$runningDistance = trim(fgets(STDIN));
$road = new Road($runningDistance);
[$rabbitTimeOf1km, $rabbitKeepRunningDistance, $rabbitBreakTime] = explode(" ", trim(fgets(STDIN)));
$rabbit = new Rabbit($rabbitTimeOf1km, $rabbitKeepRunningDistance, $rabbitBreakTime);
$kameTimeOf1km = trim(fgets(STDIN));
$kame = new Kame($kameTimeOf1km);
$winnerChecker = new WinnerChecker($road, $rabbit, $kame);
echo $winnerChecker->outputWinner();
