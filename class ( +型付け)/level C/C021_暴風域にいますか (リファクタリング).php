##########################
# for文をスッキリさせた
# クラス内で定数を使用した
##########################

<?php

    [$stormCenterX, $stormCenterY, $smallStormRadius, $largeStormRadius] = explode(" " ,fgets(STDIN));
    
    $storm =new Storm($stormCenterX, $stormCenterY, $smallStormRadius, $largeStormRadius);
    
    $personNum = trim(fgets(STDIN));
    
    for($i = 0; $i < $personNum; $i++) {
        [$manPositionX, $manPositionY] = explode(" " ,fgets(STDIN));
        $manList[] = new Man($manPositionX, $manPositionY);
    }
    
    $stormArea = new StormArea($storm, $manList);   
    echo $stormArea->judgeInsideOfStormArea();  
    
    class Storm
    {
        const SQUARED = 2;

        private $stormCenterX;    
        private $stormCenterY;    
        private $smallStormRadius;    
        private $largeStormRadius;    
        
        public function __construct(
            int $stormCenterX, 
            int $stormCenterY, 
            int $smallStormRadius, 
            int $largeStormRadius
        ){
            $this->stormCenterX     = $stormCenterX;
            $this->stormCenterY     = $stormCenterY;
            $this->smallStormRadius = $smallStormRadius;
            $this->largeStormRadius = $largeStormRadius;
        }
        
        public function stormCenterX() : int
        {
            return $this->stormCenterX;
        }
        
        public function stormCenterY() : int
        {
            return $this->stormCenterY;
        }
        
        public function smallStormArea() : int
        {
            return $this->smallStormRadius**self::SQUARED;
        }
        
        public function largeStormArea() : int
        {
            return $this->largeStormRadius**self::SQUARED;
        }
    }
    
    class Man
    {
        private $manPositionX;    
        private $manPositionY;    
        
        public function __construct(int $manPositionX, int $manPositionY)
        {
            $this->manPositionX = $manPositionX;
            $this->manPositionY = $manPositionY;
        }
        
        public function manPositionX() : int
        {
            return $this->manPositionX;
        }
        
        public function manPositionY() : int
        {
            return $this->manPositionY;
        }
    }
    
    class StormArea
    {
        const SQUARED = 2;
        const YES     = 'yes';
        const NO      = 'no';
        
        private $storm;
        private $manList;
        
        public function __construct(Storm $storm, array $manList)
        {
            $this->storm = $storm;
            $this->manList   = $manList;
        }

        public function manPositionY() : int
        {
            return $this->manPositionY;
        }

        private function calculateDistanceFromStorm(Man $man) : int
        {
            $distanceX = $man->manPositionX() - $this->storm->stormCenterX(); 
            $distanceY = $man->manPositionY() - $this->storm->stormCenterY(); 
            return $distanceX**self::SQUARED + $distanceY**self::SQUARED;
        }

        private function compare(Man $man) : bool
        {
            $distance = $this->calculateDistanceFromStorm($man);
            return  $this->storm->smallStormArea() <= $distance && $distance <= $this->storm->largeStormArea();
        }

        public function judgeInsideOfStormArea() : string
        {
            $determinationOfAreaList = [];
            foreach($this->manList as $man) {
                $determinationOfAreaList[] = $this->compare($man)
                ? self::YES
                : self::NO;
            }
            return implode("\n", $determinationOfAreaList);
        }
    }
