<?php
    
    [$lowWage, $normalWage, $highWage] = explode(" ", trim(fgets(STDIN)));
    $wage = new Wage($lowWage, $normalWage, $highWage);
    $hourlyWage = new HourlyWage($wage);
    
    $workdayNum = trim(fgets(STDIN));
    for($i = 0; $i < $workdayNum; $i++) {
        [$begin, $finish] = explode(" ", trim(fgets(STDIN)));
        $workHour = new WorkHour($begin, $finish);
        $totalWageChecker = new TotalWageChecker($workHour, $hourlyWage);
        $totalWage[] = $totalWageChecker->calcurateTotalWage();
    }
    echo array_sum($totalWage);
    
    class Wage
    {
        private $lowWage;
        private $normalWage;
        private $highWage;
        
        public function __construct(int $lowWage, int $normalWage, int $highWage)
        {
            $this->lowWage   = $lowWage;
            $this->normalWage = $normalWage;
            $this->highWage  = $highWage;
        }
        
        public function lowWage() : int
        {
            return $this->lowWage;
        }
        
        public function normalWage() : int
        {
            return $this->normalWage;
        }
        
        public function highWage() : int
        {
            return $this->highWage;
        }
    }
    
    class HourlyWage
    {
        const HIGH_WAGE_START_TIME = 0;
        const HIGH_WAGE_TIME_LENGTH = 9;
        const LOW_WAGE_START_TIME = 9;
        const LOW_WAGE_TIME_LENGTH = 8;
        const NORMAL_WAGE_START_TIME = 17;
        const NORMAL_WAGE_TIME_LENGTH = 5;
        const HIGH_WAGE_START_TIME_BY_MIDNIGHT = 22;
        const HIGH_WAGE_TIME_LENGTH_BY_MIDNIGHT = 3;
        
        private $wage;
        
        public function __construct(Wage $wage)
        {
            $this->wage  = $wage;
        }
        
        public function earlymorningWage() : array
        {
            $earlymorningWage = array_fill(
                                self::HIGH_WAGE_START_TIME, 
                                self::HIGH_WAGE_TIME_LENGTH, 
                                $this->wage->highWage()
                            );
            return $earlymorningWage;
        }
        
        public function daytimeWage() : array
        {
            $daytimeWage = array_fill(
                                self::LOW_WAGE_START_TIME, 
                                self::LOW_WAGE_TIME_LENGTH, 
                                $this->wage->lowWage()
                            );
            return $daytimeWage;
        }
        
        public function nightWage() : array
        {
            $nightWage = array_fill(
                                self::NORMAL_WAGE_START_TIME,
                                self::NORMAL_WAGE_TIME_LENGTH, 
                                $this->wage->normalWage()
                            );
            return $nightWage;
        }
        
        public function midnightWage() : array
        {
            $midnightWage = array_fill(
                                self::HIGH_WAGE_START_TIME_BY_MIDNIGHT, 
                                self::HIGH_WAGE_TIME_LENGTH_BY_MIDNIGHT,
                                $this->wage->highWage()
                            );
            return $midnightWage;
        }
        
        public function createHourlyWageList() : array
        {
            $hourlyWage = array_merge(
                                $this->earlymorningWage(), 
                                $this->daytimeWage(), 
                                $this->nightWage(), 
                                $this->midnightWage()
                            );
            return $hourlyWage;
        }
    }
    
    class WorkHour
    {
        private $begin; 
        private $finish;
        
        public function __construct(int $begin, int $finish)
        {
            $this->begin  = $begin;
            $this->finish = $finish;
        }
        
        public function begin() : int
        {
            return $this->begin;
        }
        
        public function finish() : int
        {
            return $this->finish;
        }
    }
    
    class TotalWageChecker
    {
        private $workHour;
        private $hourlyWage;
        
        public function __construct(WorkHour $workHour, HourlyWage $hourlyWage)
        {
            $this->workHour   = $workHour;
            $this->hourlyWage = $hourlyWage;
        }
        
        public function calcurateTotalWage() : int
        {
            $totalWage = []; 
            for($j = $this->workHour->begin(); $j < $this->workHour->finish(); $j++) {
                $totalWage[] = $this->hourlyWage->createHourlyWageList()[$j];
            }
            return array_sum($totalWage);
        }
    }
