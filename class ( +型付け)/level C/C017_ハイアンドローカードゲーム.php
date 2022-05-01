<?php

    [$parentCard, $nextParentCard] = explode(" ", trim(fgets(STDIN)));

    $count = trim(fgets(STDIN));

    for($i = 0; $i < $count; $i++) {
        [$childCard, $nextChildCard] = explode(" ", trim(fgets(STDIN)));
        $cardList = new CardList($parentCard,$nextParentCard, $childCard, $nextChildCard);
        echo $cardList->classifyCardNumber() . "\n";
    }


    class CardList
    {
        const STRONG_CARD_SET = "High";
        const WEAK_CARD_SET = "Low";

        private $parentCard;
        private $nextParentCard;
        private $childCard;
        private $nextChildCard;

        public function __construct(string $parentCard, string $nextParentCard, string $childCard, string $nextChildCard)
        {
            $this->parentCard = $parentCard ;
            $this->nextParentCard = $nextParentCard;
            $this->childCard = $childCard;
            $this->nextChildCard = $nextChildCard;
        }

        function classifyCardNumber() : string
        {

            if ($this->parentCard > $this->childCard) return self::STRONG_CARD_SET;
            if ($this->parentCard == $this->childCard) {
                return ($this->nextParentCard < $this->nextChildCard)
                ?  self::STRONG_CARD_SET
                : self::WEAK_CARD_SET;
            }
            return self::WEAK_CARD_SET;
        }
    }
