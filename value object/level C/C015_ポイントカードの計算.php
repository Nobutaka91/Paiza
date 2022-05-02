<?php
$receiptNum = fgets(STDIN);

$perchaseInfoList = [];
for ($i = 0; $i < $receiptNum; $i++) {
    [$purchaseDate, $purchasePrice] = explode(" ", trim(fgets(STDIN)));
    $purchaseDate = new PerchaseDate($purchaseDate);
    $purchasePrice = new PerchasePrice($purchasePrice);
    $perchaseInfoList[] = new PerchaseInfo($purchaseDate, $purchasePrice);
}

$perchasePoint = new PerchasePoint($perchaseInfoList);
echo $perchasePoint->findTotalPurchasePoint();

final class PerchaseDate
{
    const FIRST_ISSUED_DATE_OF_THE_RECEIPT = 1;
    const LAST_ISSUED_DATE_OF_THE_RECEIPT  = 31;

    private $value;

    public function __construct(int $value)
    {
        if ($value < self::FIRST_ISSUED_DATE_OF_THE_RECEIPT || self::LAST_ISSUED_DATE_OF_THE_RECEIPT < $value) {
            throw new Exception("値が制限範囲外です");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

final class PerchasePrice
{
    const MIN_PERCHASE_PRICE = 1;
    const MAX_PERCHASE_PRICE = 10000;

    private $value;

    public function __construct(int $value)
    {
        if ($value < self::MIN_PERCHASE_PRICE || self::MAX_PERCHASE_PRICE < $value) {
            throw new Exception("購入金額1~10000円がポイント還元の対象です");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

final class PerchaseInfo
{
    private $purchaseDate;
    private $purchasePrice;

    public function __construct(PerchaseDate $purchaseDate, PerchasePrice $purchasePrice)
    {
        $this->purchaseDate = $purchaseDate;
        $this->purchasePrice = $purchasePrice;
    }

    public function purchaseDate(): PerchaseDate
    {
        return $this->purchaseDate;
    }

    public function purchasePrice(): PerchasePrice
    {
        return $this->purchasePrice;
    }
}

final class PerchasePoint
{
    const DAY_THREE = 3;
    const DAY_FIVE = 5;
    const POINT_RETURN_RATE_ONE = 0.01;
    const POINT_RETURN_RATE_THREE = 0.03;
    const POINT_RETURN_RATE_FIVE = 0.05;

    private $perchaseInfoList;

    public function __construct(array $perchaseInfoList)
    {
        $this->perchaseInfoList  = $perchaseInfoList;
    }

    private function isNotContain3or5(PerchaseInfo $purchase): bool
    {
        return strpos($purchase->purchaseDate()->value(), self::DAY_THREE) === false
            && strpos($purchase->purchaseDate()->value(), self::DAY_FIVE) === false;
    }

    private function  isContain3(PerchaseInfo $purchase): bool
    {
        return strpos($purchase->purchaseDate()->value(), self::DAY_THREE) !== false;
    }

    private function isContain5(PerchaseInfo $purchase): bool
    {
        return strpos($purchase->purchaseDate()->value(), self::DAY_FIVE) !== false;
    }

    public function findTotalPurchasePoint(): int
    {
        $purchasePoint = [];
        foreach ($this->perchaseInfoList as $purchase) {
            if ($this->isNotContain3or5($purchase)) $purchasePoint[] = floor($purchase->purchasePrice()->value() * self::POINT_RETURN_RATE_ONE);
            if ($this->isContain3($purchase)) $purchasePoint[] = floor($purchase->purchasePrice()->value() * self::POINT_RETURN_RATE_THREE);
            if ($this->isContain5($purchase)) $purchasePoint[] = floor($purchase->purchasePrice()->value() * self::POINT_RETURN_RATE_FIVE);
        }
        return array_sum($purchasePoint);
    }
}
