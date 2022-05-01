<?php
   
    [$coffeePrice, $discountRate] = explode(" ", trim(fgets(STDIN)));  //コーヒーの価格と割引き率を示す整数 
    
    $totalDiscountPrice[] = $coffeePrice; 
    while($coffeePrice > 0) {
        $coffeePrice = floor($coffeePrice * (1 - $discountRate / 100));
        $totalDiscountPrice[] = $coffeePrice;
    }
    
    echo array_sum($totalDiscountPrice);
