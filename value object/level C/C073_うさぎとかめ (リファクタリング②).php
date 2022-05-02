#######################
# 2レース目に馬と象が競争
#######################

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
        return $usagiTotalRunningTime + $usagiTotalBreakTime;
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

final class Horse implements Runner
{
    const WINNER_HORSE = "HORSE";
    const HORSE_BREAK_TIME_COUNT_MINUS_NUM = 1;

    private $horsePace;
    private $horseBreakDistance;
    private $horseBreakTime;

    public function __construct(Pace $horsePace, Distance $horseBreakDistance, BreakTime $horseBreakTime)
    {
        $this->horsePace = $horsePace;
        $this->horseBreakDistance = $horseBreakDistance;
        $this->horseBreakTime = $horseBreakTime;
    }

    public function findTotalTime(Distance $distance): int
    {
        $horseTotalRunningTime = $distance->value() * $this->horsePace->value();
        $horseTotalBreakTime = (ceil($distance->value() / $this->horseBreakDistance->value()) - self::HORSE_BREAK_TIME_COUNT_MINUS_NUM) * $this->horseBreakTime->value();
        return $horseTotalRunningTime + $horseTotalBreakTime;
    }

    public function name(): string
    {
        return self::WINNER_HORSE;
    }
}

final class Elephant implements Runner
{
    const WINNER_ELEPHANT = "ELEPHANT";

    private $elephantPace;

    public function __construct(Pace $elephantPace)
    {
        $this->elephantPace = $elephantPace;
    }

    public function findTotalTime(Distance $distance): int
    {
        return $distance->value() * $this->elephantPace->value();
    }

    public function name(): string
    {
        return self::WINNER_ELEPHANT;
    }
}

final class WinnerChecker
{
    const NO_WINNER_DRAW = "DRAW";

    private $player1;
    private $player2;
    private $distance;

    public function __construct(Runner $player1, Runner $player2, Distance $distance)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->distance = $distance;
    }

    public function judgeWinner(): string
    {
        $player1Time = $this->player1->findTotalTime($this->distance);
        $player2Time  = $this->player2->findTotalTime($this->distance);

        if ($player1Time < $player2Time) return $this->player1->name();
        if ($player2Time < $player1Time) return $this->player2->name();
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
echo "1レース目: " . $winnerChecker->judgeWinner();
echo "\n";

$horsePace = 3;
$horseBreakTime = 3;
$horseBreakDistance = 4;
$elephantPace = 3;
$horse = new Horse(new Pace($horsePace), new Distance($horseBreakDistance), new BreakTime($horseBreakTime));
$elephant = new Elephant(new Pace($elephantPace));

$winnerChecker = new WinnerChecker($horse, $elephant, $distance);
echo "2レース目: " . $winnerChecker->judgeWinner();
