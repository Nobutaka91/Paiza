<?php
   
    $Q = rtrim(fgets(STDIN)); //判定したい整数の個数

    for ($t = 0; $t < $Q; $t ++) {
        $N = rtrim(fgets(STDIN)); //判定したい整数
        $S = []; //$Nの約数
        for($i = 1; $i <= $N / 2; $i ++) {
            if($N % $i == 0) {
                $S[] += $i;
            }
        }
    
        $S = array_sum($S); //$Nの約数の和
    
        if ($N == $S) {
            echo "perfect" ."\n";
        } elseif (abs($N - $S) == 1) {
            echo "nearly" ."\n";
        } else {
            echo "neither" ."\n";
        }    
    }
