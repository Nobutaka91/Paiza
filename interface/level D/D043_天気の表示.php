<?php
 
    interface Weather
    {
        public function withinScope($minimum, $ObservedValue, $maximum) : bool;
    }
    
    class WheatherChecker implements Weather
    {
        const GOOD_WEATHER   = 'sunny'; 
        const NORMAL_WEATHER = 'cloudy'; 
        const BAD_WEATHER    = 'rainy'; 
        
        private $chanceOfRate;
        
        public function __construct($chanceOfRate)
        {
            $this->chanceOfRate = $chanceOfRate;
        }
        
        public function findWeather() : string
        {
            if ($this->withinScope(0, $this->chanceOfRate, 30)) return self::GOOD_WEATHER;
            if ($this->withinScope(31, $this->chanceOfRate, 70)) return self::NORMAL_WEATHER;
            if ($this->withinScope(71, $this->chanceOfRate, 100)) return self::BAD_WEATHER;
        }
        
        public function withinScope($minimum, $ObservedValue, $maximum) : bool
        {
           return $minimum <= $ObservedValue && $ObservedValue <= $maximum;
        }
    }
    
    $chanceOfRate = trim(fgets(STDIN));
    $wheatherChecker = new WheatherChecker($chanceOfRate);
    echo $wheatherChecker->findWeather();
