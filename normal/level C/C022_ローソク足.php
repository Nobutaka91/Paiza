<?php
    $loopNum = trim(fgets(STDIN));
    
    // for文を使って始値、終値、高値、安値を各配列に代入
    $opening = [];
    $closing = [];
    $high = [];
    $low = [];
    
    for ($i = 0; $i < $loopNum; $i++) {
        [$opening[], $closing[], $high[], $low[]] = explode(" ", trim(fgets(STDIN)));
    }
    
    // 始値は 1 日目の始値
    $openingPrice = $opening[0];
    
    // 終値は n 日目の終値
    $closingPrice = $closing[$loopNum - 1];
    
    // 関数maxで最も大きな値を取得
    $highPrice = max($high);
    
    // 関数minで最も小さな値を取得
    $lowPrice = min($low);
    
    echo $openingPrice." ".$closingPrice." ".$highPrice." ".$lowPrice;
