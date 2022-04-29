<?php

    $logTotal = trim(fgets(STDIN));  //ログの行数
    
    $stopPoint = [1]; //エレベーターが止まった階(最初は必ず1階からスタート)
    $count = 0; 
    for ($i = 0; $i < $logTotal; $i++) {
        $input_line = trim(fgets(STDIN)); //エレベーターが止まった階
        $stopPoint[] = $input_line;
        $result = $stopPoint[$i + 1] - $stopPoint[$i];
        
        $result = abs($result);
        $count += $result;
    }
    echo $count;


?>