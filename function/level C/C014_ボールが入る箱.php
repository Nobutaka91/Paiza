<?php

    [$boxCount, $ballRadius] = explode(" ", trim(fgets(STDIN)));

    for($i = 1; $i <= $boxCount; $i++) {
       $boxSideList = explode(" ", trim(fgets(STDIN)));
       $boxSideMin = min($boxSideList);

       if(outputAnswer($boxSideMin, $ballRadius)){
        echo $i . "\n";
       }
    }

    function outputAnswer($boxSideMin, $ballRadius)
    {
        return $boxSideMin >= $ballRadius * 2 ;
    }


    #########
    #別解1
    #########
    [$boxCount, $ballRadius] = explode(" ", trim(fgets(STDIN)));  //箱の数, ボールの半径

    for($i = 1; $i <= $boxCount; $i++) {
       $boxSideList = explode(" ", trim(fgets(STDIN)));  //array[箱の高さ、幅、奥行き]
       $boxSideMin = min($boxSideList); //arrayの最小

       if(outputResult($boxSideMin, $ballRadius)){
          echo $i . "\n";
       }
    }

    function outputResult($boxSideMin, $ballRadius)
    {
        return $boxSideMin >= $ballRadius * 2;
    }

?>

?>