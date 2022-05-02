<?php
    
    $numberOfItem = fgets(STDIN);
    //商品の単価をいれる配列
    $unitPriceArray = explode(" ", trim(fgets(STDIN)));
    //キーに商品番号、要素に商品の単価が格納される配列を作成
    for ($i = 0; $i < $numberOfItem; $i++) {
        $itemToPerchase[$i + 1] = $unitPriceArray[$i];
    }

    //最初の所持金と注文回数
    [$possesionMoney, $orderTimes] = explode(" ", trim(fgets(STDIN)));
    $balance = $possesionMoney;
    for($i = 0; $i < $orderTimes; $i++) {
        [$itemNum, $orderingNum] = explode(" ", trim(fgets(STDIN)));
        $price = $itemToPerchase[$itemNum] * $orderingNum;
        
        if ($price < $balance) {
            $balance -= $itemToPerchase[$itemNum] * $orderingNum;
        } 
    }
    
    echo $balance;
