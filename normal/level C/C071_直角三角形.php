<?php
    
    [$base, $height] = explode(" ", trim(fgets(STDIN)));
    
    for($i = 1; $i < $base; $i++) {
        for($j = 1; $j < $height; $j++) {
            
            $hypotenuse = hypot($i, $j);
            
            if(floor($hypotenuse) == $hypotenuse) {
                $triangle++;
            }
        }
    }
    echo $triangle;
