<?php
   
    [$maxLength, $maxWidth] = explode(" " ,trim(fgets(STDIN)));
    
    for ( $length = 1; $length <= $maxLength; $length++ ) {
        $pixelValueList = explode(" " ,trim(fgets(STDIN)));
        $binaryImageList = changePixcelValueIntoBinaryImage($pixelValueList, $maxWidth);
        echo implode(" ", $binaryImageList) . "\n";
    }
    
    function changePixcelValueIntoBinaryImage($pixelValueList, $maxWidth)
    {
        $binaryImageList=[];
        for($width = 1; $width <= $maxWidth; $width++) {
            if (exceedBaseLinepixelValue($pixelValueList, $width)) {
                        $binaryImageList[] = 1;
                    } else {
                        $binaryImageList[] = 0;
                    }
        }
        return $binaryImageList;
    }
    
    function exceedBaseLinepixelValue($pixelValueList, $width)
    {
        return $pixelValueList[$width-1] >= 128;
    }

