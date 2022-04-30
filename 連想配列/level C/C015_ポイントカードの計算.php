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

    foreach($purchaseList as $purchase) {
        if (strpos( $purchase["Date"] , "3") !== false) {
            $purchasePoint[] = floor($purchase["Price"] * 0.03 );
         } elseif (strpos($purchase["Date"] , "5") !== false) {
            $purchasePoint[] = floor($purchase["Price"] * 0.05 );
         } else {
            $purchasePoint[] = floor($purchase["Price"] * 0.01);
         }
    }
     echo array_sum($purchasePoint);
