<?php
//・グーは、チョキに勝ち、パーに敗れる
//・チョキは、パーに勝ち、グーに敗れる
//・パーは、グーに勝ち、チョキに敗れる
//・グー・チョキ・パーの 3 種類が出されている場合は引き分け
//・グー・チョキ・パーのいずれか 1 種類のみが出されている場合も引き分け

$num = trim(fgets(STDIN));

for ($i = 0; $i < $num; $i++) {
    $handList[] = trim(fgets(STDIN));
    $hand = array_count_values($handList);
}

$result = judgeWinner($hand, $handList);

echo implode($result);

function judgeWinner($hand, $handList)
{
    if (isCheckDraw($hand)) {
        $winner[] = "draw";
    } elseif (isCheckTwoHand($hand)) {

        $winner[] = rockWins($handList);
        $winner[] = paperWins($handList);
        $winner[] = cissorsWins($handList);
    }
    return $winner;
}

function isCheckDraw($hand) // 手の出し方が1種類または3種類の場合、drawを出力
{
    if (count($hand) == 1) return true;
    if (count($hand) == 3) return true;
}

function isCheckTwoHand($hand)
{
    if (count($hand) == 2) return true; // 手の出し方が2種類かつ、
}

function rockWins($handList) //「＄handListがグーとチョキ」の場合,グーを出力
{
    if (in_array("rock", $handList)  && in_array("scissors", $handList)) return "rock";
}

function paperWins($handList)   //「＄handListがグーとパー」の場合,パーを出力
{
    if (in_array("rock", $handList)  && in_array("paper", $handList)) return "paper";
}

function cissorsWins($handList)  //「＄handListがチョキとパー」の場合,チョキを出力
{
    if (in_array("scissors", $handList)  && in_array("paper", $handList)) return "scissors";
}

?>