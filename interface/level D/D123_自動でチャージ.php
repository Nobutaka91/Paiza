<?php

    interface Pay
    {
        public function isTightOnBalance() : int;
    }
    
    class PaizaPay implements Pay
    {
        const MINIMUM_DEPOSIT = 10000;
        const MONEY_RECEIVED  = 10000;
        
        private $money;
        
        public function __construct(int $money)
        {
            $this->money = $money;
        }
        
        public function isTightOnBalance() : int
        {
            $balance = $this->money;
            if($balance < self::MINIMUM_DEPOSIT) $balance += self::MONEY_RECEIVED;
            return $balance;
        }
    }
    
    $money = trim(fgets(STDIN));
    $paizaPay = new PaizaPay($money);
    echo $paizaPay->isTightOnBalance();
