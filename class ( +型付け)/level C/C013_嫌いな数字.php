<?php

    $hateNumber = trim(fgets(STDIN)); //嫌いな数字 (0-9)
    $hospitalRoomNumber = trim(fgets(STDIN)); //病室の総数

    for($i = 0; $i < $hospitalRoomNumber; $i++) {
        $room =  trim(fgets(STDIN));   //各病室の部屋番号を表す整数
        $partialMatchRoom = strpos($room , $hateNumber);  //strpos([検索する文字列], [探す単語],
        if($partialMatchRoom === false) {
        $desiredRoomList[] = $room;
        }
   }

    $result = new RoomList($desiredRoomList);
    echo $result->classifyRoom();

    class RoomList
    {
        const NONE = "none";

        private $desiredRoomList;

        public function __construct($desiredRoomList)
        {
            $this->desiredRoomList = $desiredRoomList;
        }

        public function classifyRoom(): string
        {
            return (isset($this->desiredRoomList)) ? implode("\n", $this->desiredRoomList) : self::NONE;
        }
    }

################################################################
# メソッドの戻り値の型がstringになる理由
# メソッドの条件がtrueの時は
#「implode("\n", $this->desiredRoomList) 」という文字列をreturnし、
# falseの時は「 self::NONE」という文字列をreturnしているから。
################################################################