<?php

interface Word
{
    public function isPhrase() : string;
}

class JoinWords implements Word
{
    const BEST_IN = "Best in";
    
    private $word;
    
    public function __construct(string $word)
    {
        $this->word = $word;
    }
    
    public function isPhrase() : string
    {
        return self::BEST_IN . " " . $this->word;
    }
}

$word = rtrim(fgets(STDIN));
$joinWords = new JoinWords($word);
echo $joinWords->isPhrase();
