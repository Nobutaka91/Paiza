<?php
    $input_line = fgets(STDIN);
    //機械の個数
    $machineNum = explode(" ",$input_line)[0];
    //分配される数
    $okashiNum = explode(" ",$input_line)[1];
    //機械の処理個数をいれる配列
    $machineArray = [];
    //標準入力からいれていく
    while ($line = fgets(STDIN)) {
        array_push($machineArray, (int)$line);
    }

    //あまりの最小
    $min = 0;
    //パックの最大個数　これは余りの数が同じ場合にこちらの値が大きいほうを優先するという条件から
    $packsMax = 0;
    //出力する際の機械のindex
    $outputIndex = 0;
    //初期の値だけ無条件で上記を保存する。そのフラグ
    $isFisrtAssign = true;

    for($i = 0 ; $i < count($machineArray);$i++)
    {
        $packs = $machineArray[$i];
        //余りを求める
        $amari = $okashiNum  %  $machineArray[$i];
        //初回は無条件でデータを保存
        if($isFisrtAssign)
        {
            $min = $amari;
            $packsMax = $packs;
            $outputIndex = $i;
            $isFisrtAssign = false;
        //最小よりも今回の機械の余りがすくなかったら
        }elseif ($min > $amari) {
            $min = $amari;
            $packsMax = $packs;
            $outputIndex = $i;
        //最小と余りが同じで、packの個数が多かったら
        }elseif ($min == $amari && $packs > $packsMax ){
            $packsMax = $packs;
            $outputIndex = $i;
        }
    }
    // 機械の出力
    echo $outputIndex + 1;
