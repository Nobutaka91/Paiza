<?php
   
    $numbers = rtrim(fgets(STDIN));
    $words = explode(" " ,rtrim(fgets(STDIN)));
    $outcome = $words[$numbers-1];
    echo $outcome;
