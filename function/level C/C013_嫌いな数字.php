<?php

    $hateNumber = trim(fgets(STDIN));
    $hospitalRoomNumber = trim(fgets(STDIN));

    for($i = 0; $i < $hospitalRoomNumber; $i++) {
        $room =  trim(fgets(STDIN));
        $partialMatchRoom = strpos($room , $hateNumber);

        if($partialMatchRoom === false) {
        $desiredRoomList[] = $room;
        }
   }

    if (outputAnswer($desiredRoomList)){
        echo implode("\n", $desiredRoomList);
    } else {
        echo "none";
    }

    function outputAnswer($desiredRoomList)
    {
        return isset($desiredRoomList) ;
    }


############
#別解
############
$hateNumber = trim(fgets(STDIN));
$hospitalRoomNumber = trim(fgets(STDIN));

for ($i = 0; $i < $hospitalRoomNumber; $i++) {
    $room =  trim(fgets(STDIN));
    $partialMatchRoom = strpos($room, $hateNumber);

    if ($partialMatchRoom === false) {
        $desiredRoomList[] = $room;
    }
}
echo output($desiredRoomList);

function output($desiredRoomList)
{
    return (isset($desiredRoomList)) ? implode("\n", $desiredRoomList) : "none";
}
