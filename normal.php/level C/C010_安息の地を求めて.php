<?php
  
    $input_line = explode(" " ,rtrim(fgets(STDIN))); 
    $constructionSiteX = $input_line[0];
    $constructionSiteY = $input_line[1];
    $constructionNoiseSize = $input_line[2];
    
    $shadeNumber = trim(fgets(STDIN));
    
    for($i = 0; $i < $shadeNumber; $i++) {
        $input_line = explode(" " ,rtrim(fgets(STDIN)));
        $shadePositionX = $input_line[0]; 
        $shadePositionY = $input_line[1]; 
        
        $differenceX = $shadePositionX - $constructionSiteX;
        $differenceY = $shadePositionY - $constructionSiteY;
        
        if ($differenceX**2 + $differenceY**2 >= $constructionNoiseSize**2) {
            echo "silent" . "\n";
        } else {
            echo "noisy" . "\n";
        }
    }
