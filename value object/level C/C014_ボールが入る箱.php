<?php

[$boxCount, $ballRadius] = explode(" ", trim(fgets(STDIN))); //箱の数, ボールの半径
$ballRadius = new Ballradius($ballRadius);

for ($i = 1; $i <= $boxCount; $i++) {
    [$boxHigh, $boxWide, $boxDepth] = explode(" ", trim(fgets(STDIN)));
    $boxHigh  = new BoxsideInfo($boxHigh);
    $boxWide  = new BoxsideInfo($boxWide);
    $boxDepth = new BoxsideInfo($boxDepth);
    $boxSideList[] = [$boxHigh, $boxWide, $boxDepth];
}

$boxList = new BoxList($boxSideList);
echo implode("\n", $boxList->classifyBoxList($ballRadius));

class Ballradius
{
    const MIN_NUM = 1;
    const MAX_NUM = 100;

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
}

class BoxsideInfo
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

class BoxList
{
    private $boxSideList;

    public function __construct(array $boxSideList)
    {
        $this->boxSideList = $boxSideList;
    }

    public function classifyBoxList($ballRadius)
    {
        foreach ($this->boxSideList as $key => $boxSide) {
            $boxsideInfo = [$boxSide[0]->value(), $boxSide[1]->value(), $boxSide[2]->value()];
            $boxSideMin = min($boxsideInfo);
            if ($boxSideMin >= $ballRadius->value() * 2) $largeBoxNum[] = $key + 1;
        }
        return $largeBoxNum;
    }
}
