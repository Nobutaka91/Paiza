<?php
    
    [$monthAndDay, $hourAndMinutes] = explode(" ", trim(fgets(STDIN)));
    
    //月と日を分割する
    [$month, $day] = explode("/", $monthAndDay);
    
    //時間と分を分割する
    [$hour, $minutes] = explode(":", $hourAndMinutes);
    
    //$hour>24の場合、$hourを24で割った時の商を$dayに足し、余りを$hourとする
    if ($hour > 24) {
        $day += floor($hour / 24);
        $hour = $hour % 24;
        //AB:XY というフォーマットになるように0埋めを行う
        if (mb_strlen($hour) == 1) {
            $hour = "0" . $hour;
        }
    //$hour=24の場合、$dayに1を足し、$hourは0とする
    } elseif ($hour == 24) {
        $day++;
        $hour = 0;
        //AB:XY というフォーマットになるように0埋めを行う
        if (mb_strlen($hour) == 1) {
            $hour = "0" . $hour;
        }
    }
    
    // "MM/dd hh:mm"というフォーマットで出力する 
    echo $month . "/" . $day . " " . $hour . ":" . $minutes;
