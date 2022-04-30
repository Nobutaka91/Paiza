<?php
    $conditionNum = trim(fgets(STDIN));

    $conditions = [];

    for ($i = 0; $i < $conditionNum; $i++) {
        $conditions[] = trim(fgets(STDIN));
    }

    $numbers = range(1, 100);

    foreach ($conditions as $condition) {
        [$key, $value] = explode(' ',$condition);

        foreach($numbers as $index => $number) {
            //条件を満たしているときは$numbersから取り除かない
            if ($key == ">"){
                if ($number > $value) {
                    continue;
                }
            } elseif ($key == "<") {
                if ($number < $value) {
                    continue;
                }
            } elseif ($key == "/") {
                if ($number % $value == 0) {
                    continue;
                }
            }
            //条件を満たさないものは$numbersから取り除く
            unset($numbers[$index]);
        }
    }

    $answer = array_pop($numbers);
    echo $answer;
