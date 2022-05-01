<?php

    $stringToInt = [
        "A" => 4,
        "E" => 3,
        "G" => 6,
        "I" => 1,
        "O" => 0,
        "S" => 5,
        "Z" => 2
    ];
    
    $word = trim(fgets(STDIN));
    $beforeLeet = new BeforeLeet($stringToInt, $word);
    
    for($i = 0; $i < strlen($word); $i++) {
        $oneCharacter = new OneCharacter($beforeLeet, $i);
        $leet  = new Leet($beforeLeet, $oneCharacter);
        echo $leet->exchangeCharacterForLeet();
    }
    
    class BeforeLeet
    {
        private $stringToInt;
        private $word;
        
        public function __construct(array $stringToInt, string $word)
        {
            $this->stringToInt = $stringToInt;
            $this->word = $word;
        }
        
        public function stringToInt() : array
        {
           return $this->stringToInt;
        }
        
        public function word() : string
        {
            return $this->word;
        } 
    }
    
    class OneCharacter
    {
        const EXTRACTED_CHARACTER_NUM = 1;
        
        private $beforeLeet;
        private $i;
        
        public function __construct(BeforeLeet $beforeLeet, int $i)
        {
            $this->beforeLeet = $beforeLeet;
            $this->i = $i;
        }
        
        public function extractOneCharacter() : string
        {
           return mb_substr($this->beforeLeet->word(), $this->i, self::EXTRACTED_CHARACTER_NUM);
        }
    }

    
    class Leet
    {
        private $beforeLeet;
        private $oneCharacter;
        
        public function __construct(BeforeLeet $beforeLeet, OneCharacter $oneCharacter)
        {
            $this->beforeLeet = $beforeLeet;
            $this->oneCharacter = $oneCharacter;
        }
        
        public function exchangeCharacterForLeet() : string
        {
            return (isset($this->beforeLeet->stringToInt()[$this->oneCharacter->extractOneCharacter()])) 
             ? $this->beforeLeet->stringToInt()[$this->oneCharacter->extractOneCharacter()] 
             : $this->oneCharacter->extractOneCharacter();
        }
    }
