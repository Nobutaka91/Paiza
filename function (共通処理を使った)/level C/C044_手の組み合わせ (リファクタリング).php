<?php

$entryNumber = trim(fgets(STDIN));

for ($i = 0; $i < $entryNumber; $i++) {
    $handList[] = trim(fgets(STDIN));
}

$eachHandCount = array_count_values($handList);

$winner = verifyWinnerHand($handList, $eachHandCount);
echo implode($winner);


function verifyWinnerHand($handList, $eachHandCount)
{
    $winnerhandList = [];

    if (validateDrawHand($eachHandCount)) {
        $winnerhandList[] = "draw";
    }

    if (validateTwoHand($eachHandCount)) {
        $winnerhandList[] = validateWinnerHand("rock", $handList, "scissors");
        $winnerhandList[] = validateWinnerHand("scissors", $handList, "paper");
        $winnerhandList[] = validateWinnerHand("paper", $handList, "rock");
    }
    return $winnerhandList;
}

function validateDrawHand($eachHandCount)
{
    if (count($eachHandCount) == 1) return true;
    if (count($eachHandCount) == 3) return true;
}

function validateTwoHand($eachHandCount)
{
    return count($eachHandCount) == 2;
}

function validateWinnerHand($winnerHand, $handList, $roseHand)
{
    if (in_array($winnerHand, $handList) && in_array($roseHand, $handList)) return $winnerHand;
}

?>