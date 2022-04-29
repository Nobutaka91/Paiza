<?php

    $Column_number = trim(fgets(STDIN));
    $key_word = trim(fgets(STDIN));

    for($i = 0;$i < $Column_number;$i++){
        $words = trim(fgets(STDIN));
    if(strpos($words,$key_word) !== false ){
            echo $words . "\n";
    }
    }
    if (strpos($words,$key_word) === false) {
            echo "None" . "\n";
    }
