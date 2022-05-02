<?php
$n = fgets(STDIN);

$perchaseInfoList = [];
for ($i = 0; $i < $n; $i++) {
    [$purchaseDate, $purchasePrice] = explode(" ", trim(fgets(STDIN)));
    $perchaseInfoList[] = new PerchaseInfo($purchaseDate, $purchasePrice);
}

$perchasePoint = new PerchasePoint($perchaseInfoList);
echo $perchasePoint->calculateTotalPurchasePoint();


final class PerchaseInfo
{
    private $purchaseDate;
    private $purchasePrice;

    public function __construct(int $purchaseDate, int $purchasePrice)
    {
        $this->purchaseDate = $purchaseDate;
        $this->purchasePrice = $purchasePrice;
    }

    public function purchaseDate(): int
    {
        return $this->purchaseDate;
    }

    public function purchasePrice(): int
    {
        return $this->purchasePrice;
    }
}

final class PerchasePoint
{
    const DEFAULT_POINT           = 0;
    const DAY_THREE               = 3;
    const DAY_FIVE                = 5;
    const POINT_RETURN_RATE_ONE   = 0.01;
    const POINT_RETURN_RATE_THREE = 0.03;
    const POINT_RETURN_RATE_FIVE  = 0.05;

    private $perchaseInfoList;

    public function __construct(array $perchaseInfoList)
    {
        $this->perchaseInfoList  = $perchaseInfoList;
    }

    private function isCheckNotContain3or5($purchase)
    {
        if (
            strpos($purchase->purchaseDate(), self::DAY_THREE) === false
            && strpos($purchase->purchaseDate(), self::DAY_FIVE) === false
        )
        return floor($purchase->purchasePrice() * self::POINT_RETURN_RATE_ONE);
    }

    private function  isCheckContain3($purchase)
    {
        if (strpos($purchase->purchaseDate(), self::DAY_THREE) !== false)
        return floor($purchase->purchasePrice() * self::POINT_RETURN_RATE_THREE);
    }

    private function isCheckContain5($purchase)
    {
        if (strpos($purchase->purchaseDate(), self::DAY_FIVE) !== false)
        return floor($purchase->purchasePrice() * self::POINT_RETURN_RATE_FIVE);
    }

    public function calculateTotalPurchasePoint(): int
    {
        $purchasePoint = self::DEFAULT_POINT;
        foreach ($this->perchaseInfoList as $purchase) {
            $purchasePoint += $this->isCheckContain3($purchase);
            $purchasePoint += $this->isCheckContain5($purchase);
            $purchasePoint += $this->isCheckNotContain3or5($purchase);
        }
        return $purchasePoint;
    }
}
