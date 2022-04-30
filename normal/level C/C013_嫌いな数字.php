<?php
    
    $n = rtrim(fgets(STDIN));
    $m = rtrim(fgets(STDIN));
    $desiredRoomList = [];
    
    for($i = 0; $i < $m; $i ++) {
        $r = rtrim(fgets(STDIN));
        $pos = strpos($r , $n);
        
        if($pos === false) { 
            $desiredRoomList[] = $r;
        } 
            
    }
    if(empty($desiredRoomList)) {
        echo "none";
    } else {
        echo implode("\n" ,$desiredRoomList);
    }
