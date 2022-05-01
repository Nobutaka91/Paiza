<?php
//ボールを収納することができる箱の番号を昇順に出力してください。

    [$boxCount, $ballRadius] = explode(" ", trim(fgets(STDIN))); //箱の数, ボールの半径

    $ballDiameter = $ballRadius * 2;

    for($i = 1; $i <= $boxCount; $i++) {
        $boxSideList = explode(" ", trim(fgets(STDIN)));   //array[箱の高さ、幅、奥行き]
        $boxSideMin = min($boxSideList);  //arrayの最小
        $desiredBoxNum = new BoxList($boxSideMin, $ballDiameter, $i);
        $outputList[] = $desiredBoxNum->classifyBoxList();
    }

    $outputList = array_filter($outputList);
    echo implode("\n",$outputList);

    class BoxList
    {
        private $boxSideMin;
        private $ballDiameter;
        private $i;

        public function __construct($boxSideMin, $ballDiameter, $i)
        {
            $this->boxSideMin = $boxSideMin;
            $this->ballDiameter = $ballDiameter;
            $this->i = $i;
        }

        function classifyBoxList()
        {
            if ($this->boxSideMin >= $this->ballDiameter) return $this->i;
        }
    }
