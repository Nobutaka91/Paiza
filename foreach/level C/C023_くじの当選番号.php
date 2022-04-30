<?php

    $winningNumber = explode(" ", rtrim(fgets(STDIN))); //当選番号
    $rafflesCount =  rtrim(fgets(STDIN)); //購入したくじの枚数

    for($i = 0; $i < $rafflesCount; $i++) {
        $rafflesList[] = explode(" ", rtrim(fgets(STDIN))); //購入したくじの番号
    }

    foreach($rafflesList as $raffles){
        $result = array_intersect($winningNumber, $raffles );
        echo count($result) ."\n";
    }
