<?php

$input_line = rtrim(fgets(STDIN));
$inputs = explode(' ', $input_line);

$accuracy = $inputs[0];
$time = $inputs[1];
$beauty = $inputs[2];

echo $score = $accuracy + $time + $beauty;
