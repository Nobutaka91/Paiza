################################
# ProductionCountクラスを無くした
################################

<?php

$itemNumPer1Hour = trim(fgets(STDIN));
$operatingHours = trim(fgets(STDIN));

$itemNumPer1Hour = new Item($itemNumPer1Hour);
$operatingHours = new Hour($operatingHours);
$operatingInfo = new OperatingInfo($itemNumPer1Hour, $operatingHours);
echo $operatingInfo->toProductionCount();


final class Item
{
    const MIN_ITEM_NUMBER = 1;
    const MAX_ITEM_NUMBER = 200;

    private $value;

    public function __construct(int $value)
    {
        if ($value < self::MIN_ITEM_NUMBER || self::MAX_ITEM_NUMBER < $value) {
            throw new Exception("商品の個数は1から200の整数で入力してください");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

final class Hour
{
    const MIN_OPERATING_HOURS = 1;
    const MAX_OPERATING_HOURS = 24;

    private $value;

    public function __construct(int $value)
    {
        if ($value < self::MIN_OPERATING_HOURS || self::MAX_OPERATING_HOURS < $value) {
            throw new Exception("稼働時間は1から24の整数で入力してください");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

final class OperatingInfo
{
    private $itemNumPer1Hour;
    private $operatingHours;

    public function __construct(Item $itemNumPer1Hour, Hour $operatingHours)
    {
        $this->itemNumPer1Hour = $itemNumPer1Hour;
        $this->operatingHours  = $operatingHours;
    }

    public function toProductionCount(): int
    {
        return $this->itemNumPer1Hour->value() * $this->operatingHours->value();
    }
}
