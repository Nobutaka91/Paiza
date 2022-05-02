<?php

[$monthAndDay, $hourAndMinutes] = explode(" ", trim(fgets(STDIN)));

//月と日を分割する
[$month, $day] = explode("/", $monthAndDay);

//時間と分を分割する
[$hour, $minutes] = explode(":", $hourAndMinutes);

$broadcastStartTime = updateBroadcastStartTime($month, $day, $hour, $minutes);
echo $broadcastStartTime;

function updateBroadcastStartTime($month, $day, $hour, $minutes)
{
    //$hour>=24の場合、$hourを24で割った時の商を$dayに足し、余りを$hourとする
    if ($hour >= 24) {
        $day += floor($hour / 24);
        $hour = $hour % 24;
    }

    // "MM/dd hh:mm"を出力する 
    $format = '%02d/%02d %02d:%02d';
    return sprintf($format, $month, $day, $hour, $minutes);
}
