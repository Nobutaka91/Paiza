<?php

    $Num = trim(fgets(STDIN));

    for($i = 0; $i < $Num; $i++) {
       [$itemNum, $price] = explode(" ", trim(fgets(STDIN)));

        $purchaseList[] = [
           "itemNum" => $itemNum,
           "price" => $price
        ];
    }

    $point = [];
    $groceryPrice = [];
    $bookPrice = [];
    $clothesPrice = [];
    $otherPrice = [];
    foreach ($purchaseList as $purchase) {

        if($purchase["itemNum"] == 0 ) {
            $groceryPrice[] = $purchase["price"];
        } elseif ($purchase["itemNum"] == 1 ) {
            $bookPrice[] = $purchase["price"];
        } elseif ($purchase["itemNum"] == 2 ) {
            $clothesPrice[] = $purchase["price"];
        } elseif ($purchase["itemNum"] == 3 ) {
            $otherPrice[] = $purchase["price"];
        }
    }

    $point[] += floor(array_sum($groceryPrice) / 100) * 5;
    $point[] += floor(array_sum($bookPrice) / 100) * 3;
    $point[] += floor(array_sum($clothesPrice) / 100) * 2;
    $point[] += floor(array_sum($otherPrice) / 100) * 1;
    echo array_sum($point);
