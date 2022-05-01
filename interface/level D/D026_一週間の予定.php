<?php

    interface Day 
    {
       public function judgeDayLeaveNumber() : int; 
    }
    
    class WeekDay implements Day
    {
        const NO = 'no';
        
        private $week;
        
        public function __construct(array $week)
        {
            $this->week = $week;
        }
        
        public function judgeDayLeaveNumber() : int
        {
            $dayLeave = 0;
            foreach($this->week as $day) {
                if($day == self::NO) {
                    $dayLeave ++;
                }
            }
            return $dayLeave;
        }
    }
    
    for($i = 1; $i <= 7; $i ++){
         $week[] = trim(fgets(STDIN));
    }
   
    $weekDay  = new WeekDay($week);
    echo $weekDay->judgeDayLeaveNumber();
