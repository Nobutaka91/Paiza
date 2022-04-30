<?php


$inputList = [2,6,3,10,4];
$maxNum = findMaxNum($inputList);
echo $maxNum;

function findMaxNum($list)
{
    $maxNum = $list[0];
    for ($i = 1; $i < count($list); $i++) { if ($maxNum < $list[$i]) $maxNum=$list[$i]; } return $maxNum;
}




?>