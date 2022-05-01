###################################################
# verifyFirstComerメソッドのところ、ガード節で記述した
###################################################
<?php

$distance_km = trim(fgets(STDIN));

[$rabbitRunningTime_perKm, $breakPoint, $breakTime_minute] = explode(" ", trim(fgets(STDIN)));
$turtleRunningTime_perKm = trim(fgets(STDIN));

$rabbitCompletionTime = new RabbitCompletionTime($rabbitRunningTime_perKm, $distance_km, $breakPoint, $breakTime_minute);
$turtleCompletionTime = new TurtleCompletionTime($turtleRunningTime_perKm, $distance_km);
$firstComer = new FirstComer($rabbitCompletionTime, $turtleCompletionTime);

echo $firstComer->verifyFirstComer();

class RabbitCompletionTime
{
    private $rabbitRunningTime_perKm;
    private $distance_km;
    private $breakPoint;
    private $breakTime_minute;

    public function __construct(int $rabbitRunningTime_perKm, int $distance_km, int $breakPoint, int $breakTime_minute)
    {
        $this->rabbitRunningTime_perKm = $rabbitRunningTime_perKm;
        $this->distance_km = $distance_km;
        $this->breakPoint = $breakPoint;
        $this->breakTime_minute = $breakTime_minute;
    }

    public function calculateRabbitCompletionTime(): int
    {
        $rabitTotalRunningTime = $this->rabbitRunningTime_perKm * $this->distance_km;
        $rabbitTotalBreakTIme = (ceil($this->distance_km / $this->breakPoint) - 1) * $this->breakTime_minute;
        return $rabitTotalRunningTime + $rabbitTotalBreakTIme;
    }
}

class TurtleCompletionTime
{
    private $turtleRunningTime_perKm;
    private $distance_km;

    public function __construct(int $turtleRunningTime_perKm, int $distance_km)
    {
        $this->turtleRunningTime_perKm = $turtleRunningTime_perKm;
        $this->distance_km = $distance_km;
    }

    public function calculateTurtleCompletionTime(): int
    {
        return $this->turtleRunningTime_perKm * $this->distance_km;
    }
}

class FirstComer
{
    private $rabbitCompletionTime;
    private $turtleCompletionTime;

    public function __construct(RabbitCompletionTime $rabbitCompletionTime, TurtleCompletionTime $turtleCompletionTime)
    {
        $this->rabbitCompletionTime = $rabbitCompletionTime;
        $this->turtleCompletionTime = $turtleCompletionTime;
    }

    public function verifyFirstComer(): string
    {
        if ($this->rabbitCompletionTime->calculateRabbitCompletionTime() == $this->turtleCompletionTime->calculateTurtleCompletionTime()) return "DRAW";

        return ($this->rabbitCompletionTime->calculateRabbitCompletionTime() < $this->turtleCompletionTime->calculateTurtleCompletionTime()) ?  "USAGI" : "KAME";
    }
}
