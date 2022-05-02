<?php
    
    $num = trim(fgets(STDIN));
    
    for($i = 0; $i < $num; $i++) {
       [$item, $price] = explode(" ", trim(fgets(STDIN))); 
       $itemPriceList[] = new ItemPriceList($item, $price);
    }
    
    $pointChecker = new PointChecker($itemPriceList);
    echo $pointChecker->findTotalPoint();
    
    class ItemPriceList
    {
      private $item;
      private $price;
      
      public function __construct(int $item, int $price)
      {
          $this->item = $item;
          $this->price = $price;
      }
      
      public function item() : int 
      {
          return $this->item;
      }
      
      public function price() : int
      {
          return $this->price;
      }
    }
    
    class PointChecker
    {
        const ITEM_NUM_ZERO  = 0;
        const ITEM_NUM_ONE   = 1;
        const ITEM_NUM_TWO   = 2;
        const ITEM_NUM_three = 3;
        
        const GROCERY = "grocery";
        const BOOK    = "book";
        const CLOTHES = "clothes";
        const OTHER   =  "other";
        
        const ONE_POINT   = 1;
        const TWO_POINT   = 2;
        const THREE_POINT = 3;
        const FIVE_POINT  = 5;
        const ONE_HUNDRED_YEN = 100;
        
        private $itemPriceList;
        
        public function __construct(array $itemPriceList)
        {
          $this->itemPriceList = $itemPriceList;
        }
        
        public function findItemPrice() : array
        {
            $PriceLIst = [self::GROCERY => 0,  self::BOOK => 0, self::CLOTHES => 0, self::OTHER => 0];
            
            foreach ($this->itemPriceList as $itemPrice) {
                if ($itemPrice->item() == self::ITEM_NUM_ZERO ) $PriceLIst[self::GROCERY] += $itemPrice->price();
                if ($itemPrice->item() == self::ITEM_NUM_ONE  ) $PriceLIst[self::BOOK]    += $itemPrice->price();
                if ($itemPrice->item() == self::ITEM_NUM_TWO  ) $PriceLIst[self::CLOTHES] += $itemPrice->price();
                if ($itemPrice->item() == self::ITEM_NUM_three) $PriceLIst[self::OTHER]   += $itemPrice->price();
            }
            return $PriceLIst;
        }
        
        public function findTotalPoint() : int 
        {
            $PriceLIst = $this->findItemPrice();
            $point = 0;
            $point += floor($PriceLIst[self::GROCERY] / self::ONE_HUNDRED_YEN) * self::FIVE_POINT;
            $point += floor($PriceLIst[self::BOOK]    / self::ONE_HUNDRED_YEN) * self::THREE_POINT;
            $point += floor($PriceLIst[self::CLOTHES] / self::ONE_HUNDRED_YEN) * self::TWO_POINT;
            $point += floor($PriceLIst[self::OTHER]   / self::ONE_HUNDRED_YEN) * self::ONE_POINT;
            return  $point;
        }
    }
