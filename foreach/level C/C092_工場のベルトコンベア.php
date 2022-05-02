<?php
   
    [$schedule_length, $itemA_num, $itemB_num] = explode(" ", trim(fgets(STDIN)));
    
    $schedule_list = str_split(trim(fgets(STDIN)));
    
    $schedule_A = trim(fgets(STDIN));
    $schedule_B = trim(fgets(STDIN));
    
    $count_A = 0;
    $count_B = 0;
    
    foreach ($schedule_list as $schedule) {
        //「先頭の部品A」を取得
        $itemA_head = substr($schedule_A, $count_A, 1);
        //「先頭の部品Aの進みたい方向」＝「信号機の示す方向」であるか調べる
        if($schedule == $itemA_head) {
            $itemA_num --;
            $count_A ++;
        }
        
        //「先頭の部品B」を取得
        $itemB_head = substr($schedule_B, $count_B, 1);
        //「先頭の部品Bの進みたい方向」＝「信号機の示す方向」であるか調べる
        if($schedule == $itemB_head) {
            $itemB_num --;
            $count_B ++;
        }
    }
    echo $itemA_num . " " . $itemB_num;
