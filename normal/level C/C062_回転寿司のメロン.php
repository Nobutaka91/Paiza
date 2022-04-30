<?php

    $input_line = trim(fgets(STDIN));
    $melon = 0;
    $count = 0;
    $eat = true;

    for ($i = 0; $i < $input_line; $i++) {
        $foods= trim(fgets(STDIN));

        if ($count >= 10){
            $eat = true;
        } else {
            $count +=1;
        }

        if ($foods == "melon" && $eat == true){
            $melon ++;
            $count = 0;
            $eat = false;
        }

    }
    echo $melon;
