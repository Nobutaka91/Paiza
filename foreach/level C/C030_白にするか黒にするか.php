<?php
   
    $input_line = explode(" " ,rtrim(fgets(STDIN)));
    $line = $input_line[0];
    $column = $input_line[1];
    
    for ( $i = 0; $i < $line; $i++ ) {
        $pixelValueList[] = explode(" " ,rtrim(fgets(STDIN)));
    }
    
    foreach($pixelValueList as $pixelValue) {
    $binaryImageList=[];

       foreach($pixelValue as $value) {
            if ($value >= 128) {
                $binaryImageList[] = 1;
            } else {
                $binaryImageList[] = 0;
            }
       }
        $result = implode(" " ,$binaryImageList);
        echo $result."\n";
    }
