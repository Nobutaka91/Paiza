array_intersect_key — 「キーを基準にして配列の共通項を計算する」

array_intersect_key($array, $arrays)

$array
値を調べるもととなる配列。

$arrays
キーを比較する対象となる配列。



<?php

//レシピに書かれている食材の数
$recipefoodNum = trim(fgets(STDIN));
//レシピの食材名と必要な数のリスト
$recipeFoodList = [];
for ($i = 0; $i < $recipefoodNum; $i++) {
    //食材の名前、その食材が必要な数
    [$foodName, $foodNeedNum] = explode(" ", trim(fgets(STDIN)));
    $recipeFoodList[$foodName] = $foodNeedNum;
}
//所持している食材の数
$possessFoodNum = trim(fgets(STDIN));
//所持している食材と数のリスト
$possessFoodList = [];
for ($i = 0; $i < $possessFoodNum; $i++) {
    //所持している食材の名前、その食材の数
    [$possessFoodName, $possessFoodNum] = explode(" ", trim(fgets(STDIN)));
    $possessFoodList[$possessFoodName] = $possessFoodNum;
}

$commonFoodList = array_intersect_key($recipeFoodList, $possessFoodList);  //二つの配列で共通するキー(=料理名)を取り出す

if (verifySameFoodNum($commonFoodList, $recipeFoodList)) {
    $result = 0;
} else {
    //何人前あるかのリスト
    $servingList = [];
    foreach ($possessFoodList as $possessFoodName => $possessFood) {
        if (checkRecipeFoodList($recipeFoodList, $possessFoodName)) continue;
        $servingList[$possessFoodName] = $possessFood / $recipeFoodList[$possessFoodName];
    }

    $minFoodNum = min($servingList);
    $result = floor($minFoodNum);
}
echo $result;

function verifySameFoodNum($commonFoodList, $recipeFoodList)
{
    return count($commonFoodList) != count($recipeFoodList);
}

function checkRecipeFoodList($recipeFoodList, $possessFoodName)
{
    return empty($recipeFoodList[$possessFoodName]);
}

?>