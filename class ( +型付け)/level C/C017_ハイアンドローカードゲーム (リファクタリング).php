############################################################################ [方針]
①リターンするだけのparentCardクラスとchildCardクラスを追加する。
②それぞれのクラスのオブジェクト(「$parentCardList 」と「$childCardList」) を、
「HighAndLowCardGame」クラスの引数として使う。
③引数の型をクラス型で指定する。そうすることで
セキュリティ的にもより強固なコードにすることができる。
############################################################################


<?php

[$parentCard, $nextParentCard] = explode(" ", trim(fgets(STDIN)));
$count = trim(fgets(STDIN));

$parentCardList = new ParentCardList($parentCard, $nextParentCard);

for ($i = 0; $i < $count; $i++) {
    [$childCard, $nextChildCard] = explode(" ", trim(fgets(STDIN)));

    $childCardList = new ChildCardList($childCard, $nextChildCard);

    $HighAndLowCardGame = new HighAndLowCardGame($parentCardList, $childCardList);
    echo $HighAndLowCardGame->compareCardNumber() . "\n";
}

class ParentCardList
{
    private $parentCard;
    private $nextParentCard;

    public function __construct(int $parentCard, int $nextParentCard)
    {
        $this->parentCard = $parentCard;
        $this->nextParentCard = $nextParentCard;
    }

    public function parentCard(): int
    {
        return $this->parentCard;
    }

    public function nextParentCard(): int
    {
        return $this->nextParentCard;
    }
}

class ChildCardList
{
    private $childCard;
    private $nextChildCard;

    public function __construct(int $childCard, int $nextChildCard)
    {
        $this->childCard = $childCard;
        $this->nextChildCard = $nextChildCard;
    }

    public function childCard(): int
    {
        return $this->childCard;
    }

    public function nextChildCard(): int
    {
        return $this->nextChildCard;
    }
}

class HighAndLowCardGame
{
    const STRONG_CARD_SET = "High";
    const WEAK_CARD_SET = "Low";

    private $parentCardList;
    private $childCardList;

    public function __construct(ParentCardList $parentCardList, ChildCardList $childCardList)
    {
        $this->parentCardList = $parentCardList;
        $this->childCardList = $childCardList;
    }

    public function compareCardNumber(): string
    {
        if ($this->parentCardList->parentCard() > $this->childCardList->childCard()) return self::STRONG_CARD_SET;
        if ($this->parentCardList->parentCard() == $this->childCardList->childCard()) {
            return ($this->parentCardList->nextParentCard() < $this->childCardList->nextChildCard())
                ?  self::STRONG_CARD_SET
                : self::WEAK_CARD_SET;
        }
        return self::WEAK_CARD_SET;
    }
}
