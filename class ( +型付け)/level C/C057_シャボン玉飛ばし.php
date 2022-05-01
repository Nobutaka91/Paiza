<?php

    [$maxTime, $startPositionX, $startPositionY] = explode(" ", trim(fgets(STDIN)));

    $positionX = new PositionX($startPositionX);
    $positionY = new PositionY($startPositionY);

    for($sec = 1; $sec <= $maxTime; $sec++) {
        [$movingDistanceX , $movingDistanceY] = explode(" ", trim(fgets(STDIN)));

        $movingDistanceList[] = new MovingDistance($movingDistanceX, $movingDistanceY);
    }

    $transitionX = new LowerlimitOfYChecker($movingDistanceList, $positionX, $positionY);

    echo max($transitionX->isLowerlimitOfY());

    class PositionX
    {
        private $startPositionX;

        public function __construct(int $startPositionX)
        {
            $this->startPositionX = $startPositionX;
        }

        public function outputFirstPositionX() : int
        {
            $firstPositionX = $this->startPositionX;
            return $firstPositionX;
        }
    }

    class PositionY
    {
        private $startPositionY;

        public function __construct(int $startPositionY)
        {
            $this->startPositionY = $startPositionY;
        }

        public function outputFirstPositionY() : int
        {
            $firstPositionY = $this->startPositionY;
            return $firstPositionY;
        }
    }

    class MovingDistance
    {
        private $movingDistanceX;
        private $movingDistanceY;

        public function __construct(int $movingDistanceX, int $movingDistanceY)
        {
            $this->movingDistanceX = $movingDistanceX;
            $this->movingDistanceY = $movingDistanceY;
        }

        public function outputMovingDistanceX() : int
        {
            return $this->movingDistanceX;
        }

        public function outputMovingDistanceY() : int
        {
            return $this->movingDistanceY;
        }
    }

    class LowerlimitOfYChecker
    {
        const Y_LOWER_LIMIT = 0;

        private $movingDistanceList;
        private $positionX;
        private $positionY;

        public function __construct(array $movingDistanceList, positionX $positionX, positionY $positionY)
        {
            $this->movingDistanceList = $movingDistanceList;
            $this->positionX = $positionX;
            $this->positionY = $positionY;
        }

        public function isLowerlimitOfY() : array
        {
            $currentPositionX = $this->positionX->outputFirstPositionX();
            $currentPositionY = $this->positionY->outputFirstPositionY();
            $transitionX[] = $currentPositionX;
            $transitionY[] = $currentPositionY;

            foreach($this->movingDistanceList as $movingDistance){

                $currentPositionX = $currentPositionX + $movingDistance->outputMovingDistanceX();
                $transitionX[] = $currentPositionX;

                $currentPositionY = $currentPositionY + $movingDistance->outputMovingDistanceY();
                $transitionY[] = $currentPositionY;

                if($currentPositionY <= self::Y_LOWER_LIMIT) {
                    break;
                }
            }
            return $transitionX;
        }
    }
