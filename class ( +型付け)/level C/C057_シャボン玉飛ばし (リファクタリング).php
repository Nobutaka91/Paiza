<?php

[$sec, $initialX, $initialY] = explode(" ", trim(fgets(STDIN)));
$initialXY = new InitialXY($initialX, $initialY);

$movementList = [];
for ($i = 1; $i <= $sec; $i++) {
    [$movementX, $movementY] = explode(" ", trim(fgets(STDIN)));
    $movementList[] = new Movement($movementX, $movementY);
}

$maximumXCalculator = new MaximumXCalculator($initialXY, $movementList);
echo $maximumXCalculator->findMaximumX();

class MaximumXCalculator
{
    // const X = "X";
    // const Y = "Y";
    const ZERO = 0;

    private $initialXY;
    private $movementList;

    public function __construct(InitialXY $initialXY, array $movementList)
    {
        $this->initialXY = $initialXY;
        $this->movementList = $movementList;
    }

    public function findMaximumX()
    {
        // $positionXList[] = $this->initialXY->initialX();
        // $transitionList = [self::X => $this->initialXY->initialX() , self::Y => $this->initialXY->initialY()];
        $currentPositionX = $this->initialXY->initialX();
        $currentPositionY = $this->initialXY->initialY();
        $positionXList[] = $currentPositionX;
        foreach ($this->movementList as $movement) {
            // $transitionList[self::X] += $movement->movementX();
            // $transitionList[self::Y] += $movement->movementY();
            // $positionXList[] = $transitionList[self::X];

            // if($transitionList[self::Y] <= self::ZERO) {
            //   break;
            // }
            $currentPositionX += $movement->movementX();
            $currentPositionY += $movement->movementY();
            $positionXList[] = $currentPositionX;
            if ($currentPositionY <= self::ZERO) break;
        }
        return max($positionXList);
    }
}

class InitialXY
{
    private $initialX;
    private $initialY;

    public function __construct(int $initialX, int $initialY)
    {
        $this->initialX = $initialX;
        $this->initialY = $initialY;
    }

    public function initialX(): int
    {
        return $this->initialX;
    }

    public function initialY(): int
    {
        return $this->initialY;
    }
}

class Movement
{
    private $movementX;
    private $movementY;

    public function __construct(int $movementX, int $movementY)
    {
        $this->movementX = $movementX;
        $this->movementY = $movementY;
    }

    public function movementX(): int
    {
        return $this->movementX;
    }

    public function movementY(): int
    {
        return $this->movementY;
    }
}
