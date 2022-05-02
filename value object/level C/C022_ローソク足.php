<?php
$days = trim(fgets(STDIN));
$stockRate = new StockRate($days);
$output = new Output($stockRate);
echo $output->getResult();

class StockRate
{
    const OPEN_RATE = 0;
    const CLOSING_RATE = 1;
    const HIGH_RATE = 2;
    const LOW_RATE = 3;
    
    private $openList;
    private $closingList;
    private $highList;
    private $lowList;
    
    public function __construct(int $days)
    {
        $this->stockPrices = $this->makeStockRateList($days);
    }
    
    private function makeStockRateList(int $days): void
    {
        for ($i = 0; $i < $days; $i++) {
            $stockList = explode(" ", trim(fgets(STDIN)));
            $this->setStockRateList($stockList);
         }
    }
    
    private function setStockRateList(array $stockList): void
    {
       $this->openList[] = $stockList[self::OPEN_RATE];
       $this->closingList[] = $stockList[self::CLOSING_RATE];
       $this->highList[] = $stockList[self::HIGH_RATE];
       $this->lowList[] = $stockList[self::LOW_RATE];
    }
    
    public function getOpenList(): array
    {
        return $this->openList;
    }
    
    public function getClosingList(): array
    {
        return $this->closingList;
    }
    
    public function getHighList(): array
    {
        return $this->highList;
    }
    
    public function getLowList(): array
    {
        return $this->lowList;
    }
}

class Output
{
    private $openList;
    private $closingList;
    private $highList;
    private $lowList;
    
    public function __construct(StockRate $stockRate)
    {
        $this->openList = $stockRate->getOpenList();
        $this->closingList = $stockRate->getClosingList();
        $this->highList = $stockRate->getHighList();
        $this->lowList = $stockRate->getLowList();
    }
    
    public function getResult(): string
    {
        $result[] = array_shift($this->openList);    
        $result[] = array_pop($this->closingList);
        $result[] = max($this->highList);
        $result[] = min($this->lowList);
        
        $result = implode(" ", $result);
        return $result;
    }
}
    
?>