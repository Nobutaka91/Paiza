<?php

    $inputLine = explode(" " ,rtrim(fgets(STDIN)));
    $boxList = $inputLine[0];
    $radius = $inputLine[1];
    $diameter = $radius * 2 ;

    for ($i = 0; $i < $boxList; $i++ ) {
        $High_Width_Depth_List[] = explode(" " ,rtrim(fgets(STDIN)));
    }

    foreach ($High_Width_Depth_List as $arrayNumber => $High_Width_Depth ) {
       $lowest_length = min($High_Width_Depth);

        if ($lowest_length >= $diameter) {
            $result = $arrayNumber + 1 ;
            echo $result ."\n";
        }
    }
