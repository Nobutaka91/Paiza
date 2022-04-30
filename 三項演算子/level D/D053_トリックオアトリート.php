<?php

    $sweet = trim(fgets(STDIN));

    $result = compareName($sweet);
    echo $result;

    function compareName($sweet) {
     $result = ($sweet == "candy" || $sweet == "chocolate") ? "Thanks!" : "No!";
     return $result;
    }
