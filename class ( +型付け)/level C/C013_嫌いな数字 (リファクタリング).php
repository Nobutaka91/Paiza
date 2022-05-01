<?php

//希望する病室の部屋番号(嫌いな数字を含まない部屋番号)をすべて改行区切りで出力する。
//希望する病室が1つもない場合は"none" と出力する。

    $hateNumber = trim(fgets(STDIN)); //嫌いな数字 (0-9)
    $hospitalRoomNumber = trim(fgets(STDIN)); //病室の総数
    $roomList = [];
    for($i = 0; $i < $hospitalRoomNumber; $i++) {
        $roomList[] =  trim(fgets(STDIN));   //各病室の部屋番号を表す整数
        // $partialMatchRoom = strpos($room , $hateNumber);  //strpos([検索する文字列], [探す単語],

        // if($partialMatchRoom === false) {
        // $desiredRoomList[] = $room;
        // }
   }

    $rooms = new RoomList($roomList);
    echo $rooms->classifyRoom($hateNumber);

    class RoomList
    {
        const NONE = "none";
        private $roomList;

        public function __construct($roomList)
        {
            $this->roomList = $roomList;
        }

        public function createDesiredRoomList(int $hateNumber) : array
        {
            $desiredRoomList = [];
            foreach($this->roomList as $room) {
                $partialMatchRoom = strpos($room , $hateNumber);
                if($partialMatchRoom === false) $desiredRoomList[] = $room;
            }
            return $desiredRoomList;
        }

        public function classifyRoom(int $hateNumber): string
        {
            $desiredRoomList = $this->createDesiredRoomList($hateNumber);
            return (!empty($desiredRoomList)) ? implode("\n", $desiredRoomList) : self::NONE;
        }
    }
