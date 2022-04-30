<?php

$num = trim(fgets(STDIN));

for ($i = 0; $i < $num; $i++) {
    $number4 = trim(fgets(STDIN));
    $numList[] = str_split($number4);
}

$PokerHand = makePokerHandList($numList);
echo implode("\n", $PokerHand);


function makePokerHandList($numList)
{
    $pokerHandsList = [];
    foreach ($numList as $value) {
        $cardsDetail = checkCardsDetail($value); //手札のうちわけを調べる
        $maxCardAppearance = countMaxCardAppearance($cardsDetail); //手札のなかでダブりのカードが何枚あるか数える
        $cardNumberTypes = countCardTypes($cardsDetail); //何種類のカードがあるか数える
        $pokerHandsList[] = checkPokerHand($maxCardAppearance, $cardNumberTypes); //ポーカーの役の種類を調べる

    }
    return $pokerHandsList;
}

function checkCardsDetail($value)
{
    // 配列の値の登場回数を調べる
    return array_count_values($value);
}

function countMaxCardAppearance($cardsDetail)
{
    return max($cardsDetail);
}

function countCardTypes($cardsDetail)
{
    return count($cardsDetail);
}

function checkPokerHand($maxCardAppearance, $cardNumberTypes)
{
    if ($maxCardAppearance == 4) return "Four Card";
    if ($maxCardAppearance == 3) return "Three Card";
    if ($maxCardAppearance == 2 && $cardNumberTypes == 2) return "Two Pair";
    if ($maxCardAppearance == 2) return "One Pair";
    if ($maxCardAppearance == 1)  return "No Pair";
}
