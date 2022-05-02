<?php
    // 考え方
    //1.次のお祭りの年数を決める
    //2.現在日からお祭りの月までの偶数月、奇数月ごとに日数を加算する。
    //3.切れ端の月は、完全な日数にはならないのでその部分を調整する。
    [$yy, $mm, $dd] = explode(" ", trim(fgets(STDIN)));
    [$nextMM, $nextDD] = explode(" ", trim(fgets(STDIN)));
    $nextYY = $yy + 1;
    while($nextYY % 4 != 1) {
        $nextYY++;
    }
    $ret = 0;
    //とりあえず単純にその月の日数をお祭りの日まで単純に足していく。
    while ($yy != $nextYY || $mm != $nextMM) {
        if ($mm % 2 == 0) {
            $ret += 15;
        } else {
            $ret += 13;
        }
        
        if ($mm == 13) {
            $mm = 1;
            $yy ++;
            continue;
        }
        $mm++;
    }
    //最初の月の経過している日数を引く
    $ret -= $dd;
    //最後の月の日数を足す
    $ret += $nextDD;
    
    echo $ret;
