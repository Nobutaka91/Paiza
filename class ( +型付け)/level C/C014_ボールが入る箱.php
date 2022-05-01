<?php

    [$boxCount, $ballRadius] = explode(" ", trim(fgets(STDIN))); //箱の数, ボールの半径

    for($i = 1; $i <= $boxCount; $i++) {
        $boxSideList = explode(" ", trim(fgets(STDIN)));   //array[箱の高さ、幅、奥行き] 
        $boxSideMin = min($boxSideList);  //arrayの最小
        $desiredBoxNum = new BoxList($boxSideMin, $ballRadius, $i);
        $outputList[] = $desiredBoxNum->classifyBoxList();
    }

    $outputList = array_filter($outputList);
    echo implode("\n",$outputList);

    class BoxList
    {
        private $boxSideMin;
        private $ballRadius;
        private $i;

        public function __construct(int $boxSideMin, int $ballRadius, int $i)
        {
            $this->boxSideMin = $boxSideMin;
            $this->ballRadius = $ballRadius;
            $this->i = $i;
        }

        function classifyBoxList() {
            if ($this->boxSideMin >= $this->ballRadius * 2) return $this->i;
        }
    }
