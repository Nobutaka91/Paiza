<?php
    
    $numberOfMembers = trim(fgets(STDIN));
    
    $firstAndLastOfHolidayList = [];
    for ($i = 0; $i < $numberOfMembers; $i++) {
        [$firstHoliday, $lastHoliday] = explode(" ", trim(fgets(STDIN)));
        $firstAndLastOfHolidayList[] = new FirstAndLastOfHoliday(new Day($firstHoliday), new Day($lastHoliday));
    }
    $commonHoliday = new CommonHoliday($firstAndLastOfHolidayList);
    echo $commonHoliday->judgeAllMemberCanGoOut($numberOfMembers);
    
    final class Day
    {
        const DAY_ONE = 1;
        const DAY_THIRTY_ONE = 31;
        
        private $value;
        
        public function __construct(int $value)
        {
            if ($value < self::DAY_ONE || self::DAY_THIRTY_ONE < $value) {
                throw new Exception ("値(日付)は1から31の整数で入力してください");
            }
            $this->value = $value;
        }
        
        public function value() : int 
        {
            return $this->value;
        }
    }
    
    final class FirstAndLastOfHoliday
    {
        private $firstHoliday;
        private $lastHoliday;
        
        public function __construct(Day $firstHoliday, Day $lastHoliday)
        {
            $this->firstHoliday = $firstHoliday;
            $this->lastHoliday  = $lastHoliday;
        }
        
        public function firstHoliday() : Day
        {
            return $this->firstHoliday;
        }
        
        public function lastHoliday() : Day
        {
            return $this->lastHoliday;
        }
    }
    
    final class CommonHoliday
    {
        
        const SUMMER_VACATION_WIth_ALL_MEMBER = "OK";
        const NO_SUMMER_VACATION = "NG";
        
        private $firstAndLastOfHolidayList;
        
        public function __construct(array $firstAndLastOfHolidayList)
        {
            $this->firstAndLastOfHolidayList = $firstAndLastOfHolidayList;
        }
        
        /**
        *メンバー全員の連休を集計する
        */
        public function sumUpAllMemberConsecutiveHolidays() : array
        {
            
            $consecutiveHolidays = [];
            foreach ($this->firstAndLastOfHolidayList as $firstAndLastOfHoliday) {
                
                $firstHoliday = $firstAndLastOfHoliday->firstHoliday()->value();
                $lastHoliday  = $firstAndLastOfHoliday->lastHoliday()->value();
                
                for ($j =  $firstHoliday; $j <=  $lastHoliday; $j++) {
                    $consecutiveHolidays[] = $j;
                }
            }
            return $consecutiveHolidays;
        }
        
        /**
        *日ごとの休む人数を調べる
        */
        public function findCommonHoliday() : array
        {
            $commonHolidayList = array_count_values($this->sumUpAllMemberConsecutiveHolidays());
            return $commonHolidayList;
        }
        
         /**
        *家族全員が休みとなる日があるか判定する
        */
        public function judgeAllMemberCanGoOut(int $numberOfMembers)
        {
            return (max($this->findCommonHoliday()) == $numberOfMembers)
                ? self::SUMMER_VACATION_WIth_ALL_MEMBER
                : self::NO_SUMMER_VACATION;
        }
    }
