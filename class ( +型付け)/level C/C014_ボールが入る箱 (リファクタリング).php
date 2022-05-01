############################################################
# 元のコードに比べ、プロパティとコンストラクタのコード量を減らした
############################################################

<?php

[$boxCount, $ballRadius] = explode(" ", trim(fgets(STDIN))); //箱の数, ボールの半径
for ($i = 1; $i <= $boxCount; $i++) {
    $boxSideList[] = explode(" ", trim(fgets(STDIN)));   //array[箱の高さ、幅、奥行き]
}

$boxList = new BoxList($boxSideList);
echo implode("\n", $boxList->classifyBoxList($ballRadius));

class BoxList
{
    private $boxSideList;

    public function __construct(array $boxSideList)
    {
        $this->boxSideList = $boxSideList;
    }

    public function classifyBoxList($ballRadius)
    {
        foreach ($this->boxSideList as $key => $boxSide) {
            $boxSideMin = min($boxSide);
            if ($boxSideMin >= $ballRadius * 2) $largeBoxNum[] = $key + 1;
        }
        return $largeBoxNum;
    }
}
