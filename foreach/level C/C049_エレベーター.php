<?php
    $logTotal = trim(fgets(STDIN));  //ログの行数
 
    $stopPoint = [1]; //エレベーターが止まった階(最初は必ず1階からスタート)
    $count = 0;
    for ($i = 0; $i < $logTotal; $i++) {
        $input_line = trim(fgets(STDIN));//エレベーターが止まった階
        $stopPointList[] = $input_line;
    }

    $t = 0;
    foreach($stopPointList as $stopPoint){

        $result = $stopPoint[$t + 1] - $stopPoint[$t];
        $result = abs($result);
        $count += $result;
        $t++;
    }
    echo $count;
