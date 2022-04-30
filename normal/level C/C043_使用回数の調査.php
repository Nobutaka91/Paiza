<?php
   //課金アイテムが使用された回数
    $useNum = trim(fgets(STDIN));
    //課金アイテムを使用したプレイヤーのIDのリスト
    $playerIDList = explode(" ", trim(fgets(STDIN)));
   //各プレイヤーが課金アイテムを使った回数のリスト 
    $playerUseNumList = [];
    for ($i = 0; $i < $useNum; $i++) {
        $playerUseNumList[$playerIDList[$i]]++;
    }
    // //使用回数の最大
    $maxUseNum = max($playerUseNumList);
    // //使用回数が最大のプレイヤーID
    $maxUsePlayer = array_keys($playerUseNumList, $maxUseNum);
    sort($maxUsePlayer);
    echo implode(" ", $maxUsePlayer);
