<?php

$count = trim(fgets(STDIN)); //命令の実行回数
$var_list = array(1 => 0, 2 => 0); //変数1,2の初期化

for ($i = 0; $i < $count; $i++) {
    $input_line = trim(fgets(STDIN)); //命令を代入
    $s = explode(" ", $input_line); //命令を配列にする
    $inst = $s[0];
    $a = $s[1];
    $b = $s[2];


    if ($inst == 'SET') {
        $var_list[$a] = $b;
    } elseif ($inst == 'ADD') {
        $var_list[2] = $var_list[1] + $a;
    } elseif ($inst == 'SUB') {
        $var_list[2] = $var_list[1] - $a;
    }
}
echo $var_list[1] . " ";
echo $var_list[2];
// ・SET i a : 変数 i に値 a を代入する (i = 1, 2)
// ・ADD a :「変数 1 の値 + a」を計算し、計算結果を変数 2 に代入する
// ・SUB a :「変数 1 の値 - a」を計算し、計算結果を変数 2 に代入する



//別解
    $count = trim(fgets(STDIN)); //命令の実行回数
    $varList = array(1 => 0, 2=>0); //変数1,2の初期化
    
    for ($i=0; $i < $count; $i++) {
        [$inst, $a, $b] = explode(" ", trim(fgets(STDIN)));
    
        if ($inst == "SET") {
            $varList[$a] = $b;
        } elseif ($inst == "ADD") {
            $varList[2] = $varList[1] + $a;
        } elseif ($inst == "SUB") {
            $varList[2] = $varList[1] - $a;
        }
    }
    echo $varList[1]." ". $varList[2];
    
?>


