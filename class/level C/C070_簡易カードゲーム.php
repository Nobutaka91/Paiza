<?php

$input_line = trim(fgets(STDIN));
$outputList = [];

for ($i = 0; $i < $input_line; $i++) {
    $input = trim(fgets(STDIN));
    $cards = str_split($input);
    $cardList = new CardList($cards);
    $outputList[] = $cardList->classifyCardRole();
}

echo implode("\n", $outputList);

class CardList
{
    const MAX_CARD_COUNT_FOUR = 4;
    const MAX_CARD_COUNT_THREE = 3;
    const MAX_CARD_COUNT_TWO = 2;
    const CARD_TYPE_NUM_TWO = 2;

    const ROLE_FOUR_CARD = 'Four Card';
    const ROLE_THREE_CARD = 'Three Card';
    const ROLE_TWO_PAIR = 'Two Pair';
    const ROLE_ONE_PAIR = 'One Pair';
    const ROLE_NO_PAIR = 'No Pair';

    private $cards;    //(例)7777
    private $cardTypeNum;
    private $maxCardCount;

    public function __construct(array $cards)
    {
        $cardCount = array_count_values($cards); //手札のうちわけを調べる

        $this->cards = $cards;
        $this->cardTypeNum = count($cardCount); //手札のなかでダブりのカードが何枚あるか数える
        $this->maxCardCount =  max($cardCount); //何種類のカードがあるか数える
    }

    public function classifyCardRole(): string
    {   //ポーカーの役の種類を分類する
        if ($this->maxCardCount == self::MAX_CARD_COUNT_FOUR) return self::ROLE_FOUR_CARD;
        if ($this->maxCardCount == self::MAX_CARD_COUNT_THREE) return self::ROLE_THREE_CARD;
        if ($this->maxCardCount == self::MAX_CARD_COUNT_TWO) {
            return ($this->cardTypeNum == self::CARD_TYPE_NUM_TWO)
                ? self::ROLE_TWO_PAIR
                : self::ROLE_ONE_PAIR;
        }
        return self::ROLE_NO_PAIR;
    }
}
