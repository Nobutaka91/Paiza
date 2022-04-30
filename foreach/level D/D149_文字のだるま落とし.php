<?php

    $stringList = str_split(rtrim(fgets(STDIN)));

    $steps = rtrim(fgets(STDIN));

    foreach($stringList as $string) {
        if($string == $stringList[$steps -1] ) unset($stringList[$steps-1]);
    }

    $result = implode($stringList);
    echo $result;
