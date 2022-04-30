<?php
    $N = $input_line = fgets(STDIN);
    $purchaseDate = [];
    $purchasePrice = [];
    $purchasePoint = [];

    for($i = 0; $i < $N; $i++) {
       [$purchaseDate, $purchasePrice] = explode(" " , trim(fgets(STDIN)));

       $purchaseList[] = [
           "Date" =>  $purchaseDate,
           "Price" => $purchasePrice
       ];
    }
    echo calculateTotalPurchasePoint($purchaseList, $purchasePoint);

    function calculateTotalPurchasePoint($purchaseList, $purchasePoint)
    {
        foreach($purchaseList as $purchase) {
            $purchasePoint += isCheckContain3($purchase);
            $purchasePoint += isCheckContain5($purchase);
            $purchasePoint += isCheckNotContain3or5($purchase);
        }
        return $purchasePoint;
    }

    function  isCheckContain3($purchase)
    {
        //文字列が特定の文字列を含むか検索する
        if (strpos( $purchase["Date"] , "3") !== false) return floor($purchase["Price"] * 0.03 );
    }

    function isCheckContain5($purchase)
    {
        if (strpos($purchase["Date"] , "5") !== false) return floor($purchase["Price"] * 0.05 );
    }

    function isCheckNotContain3or5($purchase)
    {
        if (strpos( $purchase["Date"] , "3") === false && strpos( $purchase["Date"] , "5") === false) return floor($purchase["Price"] * 0.01);
    }
