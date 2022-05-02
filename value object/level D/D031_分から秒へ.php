<?php
    
    $n =rtrim(fgets(STDIN));
    $minutes = new Minutes($n);
    $seconds = $minutes->toSeconds();
    echo $seconds->value();
    
    final class Minutes
    {
        const MIN_INTEGRAL_VALUE = 1;
        const MAX_INTEGRAL_VALUE = 100;
        const SIXTY = 60;
        
        private $value;
        
        public function __construct(int $value)
        {
            if ($value < self::MIN_INTEGRAL_VALUE || self::MAX_INTEGRAL_VALUE < $value) throw new Exception ("時間(分)は1から100の整数で入力してください");
            $this->value = $value;
        }
        
        public function toSeconds() : Seconds
        {
            return new Seconds($this->value * self::SIXTY);
        }
    }
    
    final class Seconds
    {
        const MIN_INTEGRAL_VALUE = 60;
        const MAX_INTEGRAL_VALUE = 6000;
        private $value;
        
        public function __construct(int $value)
        {
            if ($value < self::MIN_INTEGRAL_VALUE || self::MAX_INTEGRAL_VALUE < $value) throw new Exception ("値が制限範囲外です");
            $this->value = $value;
        }
        
        public function value() :int 
        {
            return $this->value;
        }
    }
