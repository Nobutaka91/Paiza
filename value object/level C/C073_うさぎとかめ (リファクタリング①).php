
#####################
# interfaceも実装した
#####################

<?php

interface Runner
{
    public function name(): string;
    public function findTotalTime(Distance $distance): int;
}

final class Pace
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1 || 1000 < $value) throw new Exception("値が制御範囲外です");
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

final class Distance
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1 || 1000 < $value) throw new Exception("値が制御範囲外です");
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

final class BreakTime
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1 || 1000 < $value) throw new Exception("値が制御範囲外です");
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

final class Usagi implements Runner
{
    const WINNER_USAGI = "USAGI";
    const USAGI_BREAK_TIME_COUNT_MINUS_NUM = 1;

    private $usagiPace;
    private $usagiBreakDistance;
    private $usagiBreakTime;

    public function __construct(Pace $usagiPace, Distance $usagiBreakDistance, BreakTime $usagiBreakTime)
    {
        $this->usagiPace = $usagiPace;
        $this->usagiBreakDistance = $usagiBreakDistance;
        $this->usagiBreakTime = $usagiBreakTime;
    }

    public function findTotalTime(Distance $distance): int
    {
        $usagiTotalRunningTime = $distance->value() * $this->usagiPace->value();
        $usagiTotalBreakTime = (ceil($distance->value() / $this->usagiBreakDistance->value()) - self::USAGI_BREAK_TIME_COUNT_MINUS_NUM) * $this->usagiBreakTime->value();
        $usagiTotalTime = $usagiTotalRunningTime + $usagiTotalBreakTime;
        return $usagiTotalTime;
    }

    public function name(): string
    {
        return self::WINNER_USAGI;
    }
}

final class Kame implements Runner
{
    const WINNER_KAME = "KAME";
    private $kamePace;

    public function __construct(Pace $kamePace)
    {
        $this->kamePace = $kamePace;
    }

    public function findTotalTime(Distance $distance): int
    {
        $kameTotalTime = $distance->value() * $this->kamePace->value();
        return $kameTotalTime;
    }

    public function name(): string
    {
        return self::WINNER_KAME;
    }
}

final class WinnerChecker
{
    const NO_WINNER_DRAW = "DRAW";

    private $distance;
    private $usagi;
    private $kame;

    public function __construct(Runner $kame, Runner $usagi, Distance $distance)
    {
        $this->distance = $distance;
        $this->usagi = $usagi;
        $this->kame = $kame;
    }

    public function judgeWinner(): string
    {
        $usagiTime = $this->usagi->findTotalTime($this->distance);
        $kameTime  = $this->kame->findTotalTime($this->distance);

        if ($usagiTime < $kameTime) return $this->usagi->name();
        if ($kameTime < $usagiTime) return $this->kame->name();
        return self::NO_WINNER_DRAW;
    }
}

$distance = rtrim(fgets(STDIN));
[$usagiPace, $usagiBreakDistance, $usagiBreakTime] = explode(' ', rtrim(fgets(STDIN)));
$kamePace = rtrim(fgets(STDIN));

$distance = new Distance($distance);
$usagi = new Usagi(new Pace($usagiPace), new Distance($usagiBreakDistance), new BreakTime($usagiBreakTime));
$kame = new Kame(new Pace($kamePace));

$winnerChecker = new WinnerChecker($kame, $usagi, $distance);
echo $winnerChecker->judgeWinner();
