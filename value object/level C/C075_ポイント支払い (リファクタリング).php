################################################
# 「PointAndCardBalanceChecker」クラスをnewした。
################################################


<?php

[$cardBalance, $numberOfRides] = explode(" ", trim(fgets(STDIN)));

for ($i = 0; $i < $numberOfRides; $i++) {
    $fareTable[] = new Fare(trim(fgets(STDIN)));
}
$pointAndCardBalanceChecker = new PointAndCardBalanceChecker($fareTable, new CardBalance($cardBalance));
echo implode("\n", $pointAndCardBalanceChecker->updatePointAndBalance());

final class CardBalance
{
    const ONE = 1;
    const TEN_THOUSAND = 10000;

    private $value;

    public function __construct(int $value)
    {
        if ($value < self::ONE || self::TEN_THOUSAND < $value) throw new Exception("値が制御範囲外です");
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

final class Fare
{
    const ZERO = 0;
    const TEN  = 10;
    const TEN_THOUSAND = 10000;

    private $value;

    public function __construct(int $value)
    {
        if ($value < self::ZERO || self::TEN_THOUSAND < $value && $value % self::TEN != self::ZERO) throw new Exception("値が制御範囲外です");
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}

final class PointAndCardBalanceChecker
{
    const ZERO = 0;
    const TEN  = 10;

    private $fareTable;
    private $cardBalance;

    public function __construct(array $fareTable, CardBalance $cardBalance)
    {
        $this->fareTable = $fareTable;
        $this->cardBalance = $cardBalance;
    }

    public function updatePointAndBalance(): array
    {
        $point = self::ZERO;
        $cardBalance = $this->cardBalance->value();
        $pointAndCardBalanceList = [];
        foreach ($this->fareTable as $fare) {
            if ($fare->value() <= $point) {
                $point -= $fare->value();
            } else {
                $point += $fare->value() / self::TEN;
                $cardBalance -= $fare->value();
            }
            $pointAndCardBalanceList[] = $cardBalance . " " . $point;
        }
        return $pointAndCardBalanceList;
    }
}
