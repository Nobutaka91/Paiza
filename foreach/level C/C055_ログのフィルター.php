<?php

    $column = trim(fgets(STDIN));
    $keyword = trim(fgets(STDIN));


    for($i = 0; $i < $column; $i ++) {
        $wordList[] = trim(fgets(STDIN));
    }

    foreach ($wordList as $word) {
        if(strpos($word, $keyword) !== false) {
            echo $word . "\n";
        } else {
            $mismatch ++;
        }
    }

    if ($mismatch == $column) {
        echo "None";
    }
