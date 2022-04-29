<?php
   
    $input_line = explode(" " ,rtrim(fgets(STDIN)));
    $line = $input_line[0];
    $column = $input_line[1];
    
    for ( $i = 0; $i < $line; $i++ ) {
        $pixelValue = explode(" " ,rtrim(fgets(STDIN)));
        
        $binaryImageList=[];
        for ($j = 0; $j < $column; $j++ ) {
            if ($pixelValue[$j] >= 128) {
                $binaryImageList[] = 1;
            } else {
                $binaryImageList[] = 0;
            }
        }
        echo implode(" " ,$binaryImageList)."\n";
    }
