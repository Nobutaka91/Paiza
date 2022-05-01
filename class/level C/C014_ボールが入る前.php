array_filter()
配列から空の要素、ゼロ、false、null 値が削除される。


<?php
//ボールを収納することができる箱の番号を昇順に出力してください。

[$boxCount, $ballRadius] = explode(" ", trim(fgets(STDIN))); //箱の数, ボールの半径

for ($i = 1; $i <= $boxCount; $i++) {
    $boxSideList = explode(" ", trim(fgets(STDIN)));   //array[箱の高さ、幅、奥行き] 
    $boxSideMin = min($boxSideList);  //arrayの最小
    $desiredBoxNum = new BoxList($boxSideMin, $ballRadius, $i);
    $outputList[] = $desiredBoxNum->classifyBoxList();
}

$outputList = array_filter($outputList);
echo implode("\n", $outputList);

class BoxList
{
    const TWO = 2;

    private $boxSideMin;
    private $ballRadius;
    private $i;

    public function __construct($boxSideMin, $ballRadius, $i)
    {
        $this->boxSideMin = $boxSideMin;
        $this->ballRadius = $ballRadius;
        $this->i = $i;
    }
    function classifyBoxList()
    {
        if ($this->boxSideMin >= $this->ballRadius * self::TWO) return $this->i;
    }
}
