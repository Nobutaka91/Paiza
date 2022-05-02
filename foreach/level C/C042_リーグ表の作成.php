<?php
    $numberOfParticipants = trim(fgets(STDIN));
    for ($i = 0; $i < $numberOfParticipants; $i++) {
        for ($j = 0; $j < $numberOfParticipants; $j++) {
            $board[$i][$j] = "-";
        }
    }
    //総試合数を求める
    $totalGames = $numberOfParticipants * ($numberOfParticipants - 1) / 2;
    //リーグ表に"W"を記入していく
    for ($i = 0; $i < $totalGames; $i++) {
        [$winner, $opppent] =  explode(" ", trim(fgets(STDIN)));
        $board[$winner - 1][$opppent - 1] = "W";
        $board[$opppent - 1][$winner - 1] = "L";
    }
    //リーグ表を出力する
    foreach ($board as $line) {
        echo implode(" ", $line) . "\n";
    }
