<?php

$num = trim(fgets(STDIN));

for ($i = 0; $i < $num; $i++) {
    $number4 = trim(fgets(STDIN));
    $numList = str_split($number4);
    $numCheck = array_count_values($numList);
    $max = max($numCheck);
    $count = count($numCheck);

    if ($max == 4) {
        echo "Four Card" . "\n";
    } elseif ($max == 3) {
        echo "Three Card" . "\n";
    } elseif ($max == 2 && $count == 2) {
        echo "Two Pair" . "\n";
    } elseif ($max == 2) {
        echo "One Pair" . "\n";
    } elseif ($max == 1) {
        echo "No Pair" . "\n";
    }
}
