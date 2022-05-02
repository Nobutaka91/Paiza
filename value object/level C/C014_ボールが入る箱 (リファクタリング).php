<?php

[$boxCount, $ballRadius] = explode(" ", trim(fgets(STDIN))); //箱の数, ボールの半径
$ballRadius = new Ballradius($ballRadius);

for ($i = 1; $i <= $boxCount; $i++) {
    [$boxHigh, $boxWide, $boxDepth] = explode(" ", trim(fgets(STDIN)));
    $boxSideinfoList[] = new BoxSideInfo(new Boxside($boxHigh), new Boxside($boxWide), new Boxside($boxDepth));
}

$boxChecker = new BoxChecker($boxSideinfoList);
echo implode("\n", $boxChecker->createContainableBoxList($ballRadius));

class Ballradius
{
    const MIN_NUM = 1;
    const MAX_NUM = 100;
    const TWO = 2;

    private $value;

    public function __construct(int $value)
    {
        if ($value < self::MIN_NUM || self::MAX_NUM < $value) {
            throw new Exception("値(箱の数、ボールの半径)は1から100の整数値で入力してください");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function findBallDiameter(): int
    {
        return $this->value * self::TWO;
    }
}

class Boxside
{
    const MIN_NUM = 1;
    const MAX_NUM = 200;

    private $value;

    public function __construct($value)
    {

        if ($value < self::MIN_NUM || self::MAX_NUM < $value) {
            throw new Exception("値(箱の高さ、幅、奥行き)は1から200の整数値で入力してください");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

class BoxSideInfo
{
    private $boxHigh;
    private $boxWide;
    private $boxDepth;

    public function __construct(Boxside $boxHigh,  Boxside $boxWide, Boxside $boxDepth)
    {
        $this->boxHigh = $boxHigh;
        $this->boxWide = $boxWide;
        $this->boxDepth = $boxDepth;
    }

    public function boxHigh(): Boxside
    {
        return $this->boxHigh;
    }

    public function boxWide(): Boxside
    {
        return $this->boxWide;
    }

    public function boxDepth(): Boxside
    {
        return $this->boxDepth;
    }

    public function findBoxSideMin(): int
    {
        $boxsideList = [$this->boxHigh()->value(), $this->boxWide()->value(), $this->boxDepth()->value()];
        return min($boxsideList);
    }
}

class BoxChecker
{

    private $boxSideinfoList;

    public function __construct(array $boxSideinfoList)
    {
        $this->boxSideinfoList = $boxSideinfoList;
    }

    public function createContainableBoxList($ballRadius)
    {
        foreach ($this->boxSideinfoList as $boxNum => $boxSideInfo) {
            if ($boxSideInfo->findBoxSideMin() >= $ballRadius->findBallDiameter()) $largeBoxNum[] = $boxNum + 1;
        }
        return $largeBoxNum;
    }
}
