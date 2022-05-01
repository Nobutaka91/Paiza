<?php

    [$stormCenterX, $stormCenterY, $smallStormRadius, $largeStormRadius] = explode(" " ,fgets(STDIN));
    $storm =new Storm($stormCenterX, $stormCenterY, $smallStormRadius, $largeStormRadius);
    $personNum = trim(fgets(STDIN));

    for($i = 0; $i < $personNum; $i++) {
        [$manPositionX, $manPositionY] = explode(" " ,fgets(STDIN));
        $man = new Man($manPositionX, $manPositionY);
        $stormArea = new StormArea($storm, $man);
        echo $stormArea->calculateInsideOfStormArea() . "\n";
    }

    class Storm
    {
        private $stormCenterX;
        private $stormCenterY;
        private $smallStormRadius;
        private $largeStormRadius;

        public function __construct(int $stormCenterX, int $stormCenterY, int $smallStormRadius, int $largeStormRadius)
        {
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

        public function smallStormRadius() : int
        {
            return $this->smallStormRadius;
        }

        public function largeStormRadius() : int
        {
            return $this->largeStormRadius;
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
        private $storm;
        private $man;

        public function __construct(Storm $storm, Man $man)
        {
            $this->storm = $storm;
            $this->man   = $man;
        }

        public function manPositionY() : int
        {
            return $this->manPositionY;
        }

        public function calculateInsideOfStormArea() : string
        {
            $rangeDifferenceX = $this->man->manPositionX() - $this->storm->stormCenterX();
            $rangeDifferenceY = $this->man->manPositionY() - $this->storm->stormCenterY();

            return ($this->storm->smallStormRadius()**2 <= $rangeDifferenceX**2 + $rangeDifferenceY**2
                && $rangeDifferenceX**2 + $rangeDifferenceY**2 <= $this->storm->largeStormRadius()**2 ) ? "yes" : "no";
        }
    }
