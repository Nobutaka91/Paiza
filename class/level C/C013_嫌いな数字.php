strpos
→PHP文字列を探す

strpos([検索する文字列], [探す単語], [検索開始位置]);


<?php
####################################################
# 希望する病室の部屋番号(嫌いな数字を含まない部屋番号)を
# すべて改行区切りで出力して下さい。
# 希望する病室が1つもない場合は"none" と出力して下さい。
####################################################

$hateNumber = trim(fgets(STDIN)); //嫌いな数字 (0-9)
$hospitalRoomNumber = trim(fgets(STDIN)); //病室の総数

for ($i = 0; $i < $hospitalRoomNumber; $i++) {
    $room =  trim(fgets(STDIN));   //各病室の部屋番号を表す整数
    $partialMatchRoom = strpos($room, $hateNumber);  //strpos([検索する文字列], [探す単語])
    if ($partialMatchRoom === false) {
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

    public function classifyRoom()
    {
        return (isset($this->desiredRoomList)) ? implode("\n", $this->desiredRoomList) : self::NONE;
    }
}

?>