<?php
    
    interface Rainy 
    {
        public function judgeRainySeason() : string;
    }
    
    class Weather implements Rainy
    {
        const RAINY_DAY_NUM = 1;
        const RAINY_DAY_STANDARD_NUM = 5;
        const YES = 'yes';
        const NO = 'no';
        
        private $weatherNum;
        
        public function __construct(array $weatherNum)
        {
            $this->weatherNum = $weatherNum;
        }
        
        public function judgeRainySeason() : string
        {
            $number = array_count_values($this->weatherNum);
            return ($number[self::RAINY_DAY_NUM] >= self::RAINY_DAY_STANDARD_NUM) ? self::YES : self::NO;
        }
    }
    
    $weatherNum = explode(" " , rtrim(fgets(STDIN)));
    $Weather = new Weather($weatherNum);
    echo $Weather->judgeRainySeason();
