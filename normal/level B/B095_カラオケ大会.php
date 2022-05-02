<?php
//・誤差 5 Hz 以内なら減点しない
//・上記に当てはまらず、誤差 10 Hz 以内なら 1 点減点
//・上記に当てはまらず、誤差 20 Hz 以内なら 2 点減点
//・上記に当てはまらず、誤差 30 Hz 以内なら 3 点減点
//・上記に当てはまらない場合、5 点減点   


    //歌う人数、課題曲の長さ
    [$numberOfPeople, $lengthOfGivenSong] = explode(" ", trim(fgets(STDIN)));
    
    //正しい音程(hz)を格納した配列を作成
    $correctHzArray = [];
    for ($i = 0; $i < $lengthOfGivenSong; $i++) {
        $correctHzArray[] = trim(fgets(STDIN)); 
    }
    
    $hzArrayList = [];
    $scoreList = [];
    for ($i = 0; $i < $numberOfPeople; $i++) {
        //一人一人の音程リストを作成
        $hzArray = [];
        for ($j = 0; $j < $lengthOfGivenSong; $j++) {
            $hzArray[] = trim(fgets(STDIN));
        }
        //全員の音程リストをまとめる
        $hzArrayList[] = $hzArray;
        
        //全員に持ち点として100点を与える
        $scoreList[] = 100;
    }
    
    for ($i = 0; $i < $numberOfPeople; $i++) {
        
        for ($j = 0; $j < $lengthOfGivenSong; $j++) {
            
            //誤差を求める
            $error = abs($correctHzArray[$j] - $hzArrayList[$i][$j]);
            
            //誤差に基づいてスコアを減点していく
            if (0 <= $error && $error <= 5) {
                $scoreList[$i] -= 0;
            }  elseif (5 < $error && $error <= 10) {
                $scoreList[$i] -= 1;
            } elseif (10 < $error && $error <= 20) {
                $scoreList[$i] -= 2;
            } elseif (20 < $error && $error <= 30) {
                $scoreList[$i] -= 3;
            } else {
                $scoreList[$i] -= 5;
            }
            
            //採点後、スコアがマイナスになった場合は0点とする
            if ($scoreList[$i] < 0) {
                $scoreList[$i] = 0;
            }
        }
    }
    //参加者中の最高得点を出力する。
    echo max($scoreList);
    
?>