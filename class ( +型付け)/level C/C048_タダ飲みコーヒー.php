<?php
   
    [$coffeePrice, $discountRate] = explode(" ", trim(fgets(STDIN)));  //コーヒーの価格と割引き率を示す整数 
    
    $priceDiscountList = new PriceDiscountList($coffeePrice, $discountRate);
    
    $totalDiscountPrice = new TotalDiscountPrice($priceDiscountList);
    
    echo array_sum($totalDiscountPrice->calculateTotalDiscountPrice());

    class PriceDiscountList
    {
        private $coffeePrice;
        private $discountRate;
        
        public function __construct(int $coffeePrice, int $discountRate)
        {
            $this->coffeePrice  = $coffeePrice;
            $this->discountRate = $discountRate;
        }
        
        public function coffeePrice() : int
        {
           return $this->coffeePrice;
        }
        
        public function discountRate() : int
        {
           return $this->discountRate;
        }
    }
    
    class TotalDiscountPrice
    {
        const MOST_LOW_COFFEE_PRICE = 0; 
        const ALL                   = 1;
        const PERCENTAGE            = 100;
        
        private $priceDiscountList;
        
        public function __construct(PriceDiscountList $priceDiscountList)
        {
            $this->priceDiscountList  = $priceDiscountList;
        }
        
        public function calculateTotalDiscountPrice() : array
        {
            $discountRate = $this->priceDiscountList->discountRate();
            $coffeePrice = $this->priceDiscountList->coffeePrice();
            
            $totalDiscountPrice[] = $coffeePrice; 
            while($coffeePrice > self::MOST_LOW_COFFEE_PRICE) {
                $coffeePrice = $coffeePrice * (self::ALL - $discountRate / self::PERCENTAGE);
                $totalDiscountPrice[] = floor($coffeePrice);
            }
            return $totalDiscountPrice;
        }
    }
