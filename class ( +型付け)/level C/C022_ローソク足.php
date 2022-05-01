<?php
    $dayNum = trim(fgets(STDIN));
    
    $opening = [];
    $closing = [];
    $high = [];
    $low = [];
    
    for ($i = 0; $i < $dayNum; $i++) {
        [$opening[], $closing[], $high[], $low[]] = explode(" ", trim(fgets(STDIN)));
        
        $stockPriceFluctuations = new StockPriceFluctuations($opening, $closing, $high, $low);
    }
        
    $calculateStockPrice = new CalculateStockPrice($stockPriceFluctuations, $dayNum);
    
    echo $calculateStockPrice->openingPrice() ." ". $calculateStockPrice->closingPrice() . " " . $calculateStockPrice->highPrice() . " " . $calculateStockPrice->lowPrice();
    
    class StockPriceFluctuations 
    {
        private $opening;
        private $closing;
        private $high;
        private $low;
        
        public function __construct(array $opening, array $closing, array $high, array $low)
        {
            $this->opening = $opening;
            $this->closing = $closing;
            $this->high    = $high;
            $this->low     = $low;
        }
        
        public function opening() : array
        {
            return $this->opening;
        }
        
        public function closing() : array
        {
            return $this->closing;
        }
        
        public function high() : array
        {
            return $this->high;
        }
        
        public function low() : array
        {
            return $this->low;
        }
    }
    
    class CalculateStockPrice
    {
        private $stockPriceFluctuations;
        private $dayNum;
        
        public function __construct(StockPriceFluctuations $stockPriceFluctuations, int $dayNum)
        {
            $this->stockPriceFluctuations = $stockPriceFluctuations;
            $this->dayNum                    = $dayNum;
            
        }
        
        public function openingPrice() : int
        {
            $openingPrice = $this->stockPriceFluctuations->opening();
            return $openingPrice[0];
        }
        
        public function closingPrice() : int
        {
            $closingPrice = $this->stockPriceFluctuations->closing();
            return $closingPrice[$this->dayNum - 1];
        }
        
        public function highPrice() : int
        {
            $highPrice = $this->stockPriceFluctuations->high();
            return max($highPrice);
        }
        
        public function lowPrice() : int
        {
            $lowPrice = $this->stockPriceFluctuations->low();
            return min($lowPrice);
        }
    }
