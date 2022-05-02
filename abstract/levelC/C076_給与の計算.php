<?php

//・9 時から 17 時まで : 時給 X 円 (通常の時給)
//・17 時から 22 時まで : 時給 Y 円 (夜の時給)
//・それ以外の時間 : 時給 Z 円 (深夜の時給)

abstract class Salary
{
    abstract public function salary(): int;
}

class SalaryCalculator
{
    const NORMAL_SARALY_START = 9;
    const NORMAL_SARALY_FINISH = 16;
    const NIGHT_SARALY_START = 17;
    const NIGHT_SARALY_FINISH = 22;

    private $workHoursInfoList;
    private $salaryInfo;

    public function __construct(array $workHoursInfoList, SalaryInfo $salaryInfo)
    {
        $this->workHoursInfoList = $workHoursInfoList;
        $this->salaryInfo = $salaryInfo;
    }

    public function resolveTotalSalary()
    {
        $totalSalary = 0;

        foreach ($this->workHoursInfoList as $workHoursInfo) {
            $totalSalary += $this->resolveSalary($workHoursInfo);
        }
        return $totalSalary;
    }

    private function resolveSalary(WorkHoursInfo $workHoursInfo): int
    {
        $start = $workHoursInfo->start();
        $finish = $workHoursInfo->finish();
        $totalSalary = 0;
        for ($j = $start; $j < $finish; $j++) {
            if (self::NORMAL_SARALY_START <= $j && $j <= self::NORMAL_SARALY_FINISH) {
                $totalSalary += $this->salaryInfo->nomalSalary()->salary();
            } elseif (self::NIGHT_SARALY_START <= $j && $j < self::NIGHT_SARALY_FINISH) {
                $totalSalary += $this->salaryInfo->nightSalary()->salary();
            } else {
                $totalSalary += $this->salaryInfo->midnightSalary()->salary();
            }
        }
        return $totalSalary;
    }
}

class SalaryInfo
{
    private $nomalSalary;
    private $nightSalary;
    private $midnightSalary;

    public function __construct(Salary $nomalSalary, Salary $nightSalary, Salary $midnightSalary)
    {
        $this->nomalSalary = $nomalSalary;
        $this->nightSalary = $nightSalary;
        $this->midnightSalary = $midnightSalary;
    }

    public function nomalSalary(): Salary
    {
        return $this->nomalSalary;
    }

    public function nightSalary(): Salary
    {
        return $this->nightSalary;
    }

    public function midnightSalary(): Salary
    {
        return $this->midnightSalary;
    }
}

class WorkHoursInfo
{
    private $start;
    private $finish;

    public function __construct(int $start, int $finish)
    {
        $this->start = $start;
        $this->finish = $finish;
    }

    public function start(): int
    {
        return $this->start;
    }

    public function finish(): int
    {
        return $this->finish;
    }
}

class NomalSalary extends Salary
{
    private $nomalSalary;

    public function __construct(int $nomalSalary)
    {
        $this->nomalSalary = $nomalSalary;
    }

    public function salary(): int
    {
        return $this->nomalSalary;
    }
}

class NightSalary extends Salary
{
    private $nightSalary;

    public function __construct(int $nightSalary)
    {
        $this->nightSalary = $nightSalary;
    }

    public function salary(): int
    {
        return $this->nightSalary;
    }
}

class MidnightSalary extends Salary
{
    private $midnightSalary;

    public function __construct(int $midnightSalary)
    {
        $this->midnightSalary = $midnightSalary;
    }

    public function salary(): int
    {
        return $this->midnightSalary;
    }
}

[$inputNomalSalary, $inputNightSalary, $inputMidnightSalary] = explode(' ', rtrim(fgets(STDIN)));
$nomalSalary = new NomalSalary($inputNomalSalary);

$nightSalary = new NightSalary($inputNightSalary);
$midnightSalary = new MidnightSalary($inputMidnightSalary);
$salaryInfo = new SalaryInfo($nomalSalary, $nightSalary, $midnightSalary);

$workDays = rtrim(fgets(STDIN));
$workHoursInfoList = [];
for ($i = 0; $i < $workDays; $i++) {
    [$start, $finish] = explode(' ', rtrim(fgets(STDIN)));
    $workHoursInfoList[] = new WorkHoursInfo($start, $finish);
}

$salaryCalculator = new SalaryCalculator($workHoursInfoList, $salaryInfo);
echo $salaryCalculator->resolveTotalSalary();
