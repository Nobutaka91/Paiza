<?php

$count = trim(fgets(STDIN));
$var_list = array(1 => 0, 2 => 0);

for ($i = 0; $i < $count; $i++) {
    $input_line = trim(fgets(STDIN));
    $s = explode(" ", $input_line);
    $inst = $s[0];
    $a = $s[1];
    $b = $s[2];

    $var_list = outputAnswer($inst, $var_list, $a, $b);
}
echo $var_list[1] . " " . $var_list[2];

function outputAnswer($inst, $var_list, $a, $b)
{
    if ($inst == 'SET') {
        $var_list[$a] = $b;
    } elseif ($inst == 'ADD') {
        $var_list[2] = $var_list[1] + $a;
    } elseif ($inst == 'SUB') {
        $var_list[2] = $var_list[1] - $a;
    }

    return $var_list;
}

