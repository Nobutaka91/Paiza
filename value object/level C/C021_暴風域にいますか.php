<?php
    [$stormCenterX, $stormCenterY, $smallStormRadius, $largeStormRadius] = explode(" " ,fgets(STDIN));
    
    $stormCenterX = new Position($stormCenterX);
    $stormCenterY = new Position($stormCenterY);
    $smallStormRadius = new StormRadius($smallStormRadius);
    $largeStormRadius = new StormRadius($largeStormRadius);

    $storm = new Storm($stormCenterX, $stormCenterY, $smallStormRadius, $largeStormRadius);
    
    $personNum = trim(fgets(STDIN));
    
    for($i = 0; $i < $personNum; $i++) {
        [$manPositionX, $manPositionY] = explode(" " ,fgets(STDIN));
        $manPositionX = new Position($manPositionX);
        $manPositionY = new Position($manPositionY);
        $manList[] = new Man($manPositionX, $manPositionY);
    }
    
    $stormArea = new StormArea($storm, $manList);   
    echo $stormArea->judgeInsideOfStormArea();  
    
    final class Position
    {
        const MIN_POSITION = -100;
        const MAX_POSITION = 100;
        
        private $value;
        
        public function __construct(int $value)
        {
            if ($value < self::MIN_POSITION || self::MAX_POSITION < $value) {
                throw new Exception ("制御範囲外の値です");
            }
            $this->value = $value;
        }
        
        public function value() : int
        {
            return $this->value;
        }
    }
    
    final class StormRadius
    {
        const MIN_RADIUS = 1;
        const MAX_RADIUS = 100;
        
        private $value;
        
        public function __construct(int $value)
        {
            if ($value < self::MIN_RADIUS || self::MAX_RADIUS < $value) {
                throw new Exception ("制御範囲外の値です");
            }
            $this->value = $value;
        }
        
        public function value() : int
        {
            return $this->value;
        }
    }
    
    class Storm
    {
        const SQUARED = 2;

        private $stormCenterX;    
        private $stormCenterY;    
        private $smallStormRadius;    
        private $largeStormRadius;    
        
        public function __construct(
            Position $stormCenterX, 
            Position $stormCenterY, 
            StormRadius $smallStormRadius, 
            StormRadius $largeStormRadius
        ){
            $this->stormCenterX = $stormCenterX;
            $this->stormCenterY = $stormCenterY;
            $this->smallStormRadius = $smallStormRadius;
            $this->largeStormRadius = $largeStormRadius;
        }
        
        public function stormCenterX() : Position
        {
            return $this->stormCenterX;
        }
        
        public function stormCenterY() : Position
        {
            return $this->stormCenterY;
        }
        
        public function smallStormArea() : int
        {
            return $this->smallStormRadius->value()**self::SQUARED;
        }
        
        public function largeStormArea() : int
        {
            return $this->largeStormRadius->value()**self::SQUARED;
        }
    }
    
    class Man
    {
        private $manPositionX;
        private $manPositionY;
        
        public function __construct(Position $manPositionX, Position $manPositionY)
        {
            $this->manPositionX = $manPositionX;
            $this->manPositionY = $manPositionY;
        }
        
        public function manPositionX() : Position
        {
            return $this->manPositionX;
        }
        
        public function manPositionY() : Position
        {
            return $this->manPositionY;
        }
    }
    
    class StormArea
    {
        const SQUARED = 2;
        const YES = 'yes';
        const NO = 'no';
        
        private $storm;
        private $manList;
        
        public function __construct(Storm $storm, array $manList)
        {
            $this->storm = $storm;
            $this->manList = $manList;
        }
        
        private function finfDistanceFromStorm(Man $man) : int
        {
            $distanceX = $man->manPositionX()->value() - $this->storm->stormCenterX()->value(); 
            $distanceY = $man->manPositionY()->value() - $this->storm->stormCenterY()->value(); 
            return $distanceX**self::SQUARED + $distanceY**self::SQUARED;
        }
        
        private function comparePositionalRelationOfStormAndMan(Man $man) : bool
        {
            $distance = $this->finfDistanceFromStorm($man);
            return  $this->storm->smallStormArea() <= $distance && $distance <= $this->storm->largeStormArea();
        }
        
        public function judgeInsideOfStormArea() : string
        {
            $determinationOfAreaList = [];
            foreach($this->manList as $man) {
                $determinationOfAreaList[] = $this->comparePositionalRelationOfStormAndMan($man)
                ? self::YES 
                : self::NO;
            }
            return implode("\n", $determinationOfAreaList);
        }
    }
