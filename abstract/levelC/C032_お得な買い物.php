<?php

    //ポイントは以下の手順で計算される。
    //1. 商品の種類ごとの合計購入金額を計算する。
    //2. それぞれのポイント付与基準に基づき商品の種類ごとの付与ポイントを計算する。
    //3. 商品の種類ごとの付与ポイントを合計する。(100円未満は切り捨て)
    
    abstract class Shopping
    {
       abstract public function value() : int; 
    }
    
    class Item extends Shopping
    {
        const ITEM_NUM_ZERO  = 0;
        const ITEM_NUM_three = 3;
        
        private $value;
        
        public function __construct(int $value)
        {
          if ($value < self::ITEM_NUM_ZERO || self::ITEM_NUM_three < $value) {
              throw new Exception ("値が制御範囲外です");
          }
          $this->value = $value;
        }
      
        public function value() : int 
        {
          return $this->value;
        }
    }
    
    
    class Price extends Shopping
    {
        const TEN = 10;
        const ZERO = 0;
        const TEN_YEN = 10;
        const TEN_THOUSAND_YEN = 10000;
        const IN_TEN_YEN_INCREMENTS = 10;
        
        private $value;
        
        public function __construct(int $value)
        {
          if ($value % self::TEN != self::ZERO || $value < self::TEN_YEN || self::TEN_THOUSAND_YEN < $value) {
              throw new Exception ("値が制御範囲外です");
          }
          $this->value = $value;
        }
      
        public function value() : int 
        {
          return $this->value;
        }
    }
    

    final class ItemPriceList
    {
        private $item;
        private $price;
      
        public function __construct(Shopping $item, Shopping $price)
        {
          $this->item = $item;
          $this->price = $price;
        }
      
        public function item() : Shopping 
        {
          return $this->item;
        }
      
        public function price() : Shopping
        {
          return $this->price;
        }
    }
    
    
    final class PointChecker
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
        
        //1. 商品の種類ごとの合計購入金額を計算する。
        public function findItemPrice() : array
        {
            $priceList = [self::GROCERY => 0,  self::BOOK => 0, self::CLOTHES => 0, self::OTHER => 0];
            foreach ($this->itemPriceList as $itemPrice) {
                if ($itemPrice->item()->value() == self::ITEM_NUM_ZERO ) $priceList[self::GROCERY] += $itemPrice->price()->value();
                if ($itemPrice->item()->value() == self::ITEM_NUM_ONE  ) $priceList[self::BOOK]    += $itemPrice->price()->value();
                if ($itemPrice->item()->value() == self::ITEM_NUM_TWO  ) $priceList[self::CLOTHES] += $itemPrice->price()->value();
                if ($itemPrice->item()->value() == self::ITEM_NUM_three) $priceList[self::OTHER]   += $itemPrice->price()->value();
            }
            
            return $priceList;
        }
        
        //2. それぞれのポイント付与基準に基づき商品の種類ごとの付与ポイントを計算する。
        //3. 商品の種類ごとの付与ポイントを合計する。(100円未満は切り捨て)
        public function findTotalPoint() : int 
        {
            $priceList = $this->findItemPrice();
            $point = 0;
            $point += floor($priceList[self::GROCERY] / self::ONE_HUNDRED_YEN) * self::FIVE_POINT;
            $point += floor($priceList[self::BOOK]    / self::ONE_HUNDRED_YEN) * self::THREE_POINT;
            $point += floor($priceList[self::CLOTHES] / self::ONE_HUNDRED_YEN) * self::TWO_POINT;
            $point += floor($priceList[self::OTHER]   / self::ONE_HUNDRED_YEN) * self::ONE_POINT;
            return  $point;
        }
    }
    
    $itemTotal = trim(fgets(STDIN));
    
    for($i = 0; $i < $itemTotal; $i++) {
        [$item, $price] = explode(" ", trim(fgets(STDIN)));
        $item = new Item($item);
        $price = new Price($price);
        $itemPriceList[] = new ItemPriceList($item, $price);
    }
    
    $pointChecker = new PointChecker($itemPriceList);
    echo $pointChecker->findTotalPoint();
