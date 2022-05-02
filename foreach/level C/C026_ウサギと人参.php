<?php

[$numberOfCarrot, $baseValueOfSugar, $toleranceNumber] = explode(" ", trim(fgets(STDIN)));

$carrotList = [];
for ($i = 0; $i < $numberOfCarrot; $i++) {
    [$mass, $sugar] = explode(" ", trim(fgets(STDIN)));
    $carrotList[] = [$mass, $sugar];
}

$desiredCarrotList = [];
foreach ($carrotList as $num => $carrot) {

    $carrotMass = $carrot[0];
    $carrotSugar = $carrot[1];

    //糖分が許容範囲内の人参を見つけ、配列に格納する
    if ($baseValueOfSugar - $toleranceNumber <= $carrotSugar && $carrotSugar <= $baseValueOfSugar + $toleranceNumber) {
        $desiredCarrotList[$num + 1] = $carrotMass;
    }
} 

if (!empty($desiredCarrotList)) {
    //$desiredCarrotListを質量の多い順にソートする
    arsort($desiredCarrotList);
    //質量が最も高い人参の番号を出力する
    echo array_key_first($desiredCarrotList);
} else {
    //糖分が許容範囲内の人参が無ければ「not found」と出力する
    echo "not found";
}
