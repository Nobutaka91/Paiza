<?php
    $N = $input_line = fgets(STDIN); //各レシートの数
    $date = [];
    $price = [];
    $point = [];
    for($i = 0; $i < $N; $i++) {
    [$date[], $price[]] = explode(" " , trim(fgets(STDIN)));
        if (strpos( $date[$i], "3") !== false) {
            $point[] = floor( $price[$i] * 0.03 );
         } elseif (strpos($date[$i], "5") !== false) {
            $point[] = floor( $price[$i] * 0.05 );
         } else {
            $point[] = floor($price[$i] * 0.01);
         }
    }
     echo array_sum($point);
