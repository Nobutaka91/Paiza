<?php

$num = trim(fgets(STDIN));

for ($i = 0; $i < $num; $i++) {
    $number4 = trim(fgets(STDIN));
    $numList[] = str_split($number4);
}

$value = 0;
foreach ($numList as $value) {

    $numCheck = array_count_values($value);
    $max = max($numCheck);
    $count = count($numCheck);

    if ($max == 4) {
        echo "Four Card";
    } elseif ($max == 3) {
        echo "Three Card";
    } elseif ($max == 2 && $count == 2) {
        echo "Two Pair";
    } elseif ($max == 2) {
        echo "One Pair";
    } elseif ($max == 1) {
        echo "No Pair";
    }
    echo "\n";
}
