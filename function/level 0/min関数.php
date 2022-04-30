<?php

$inputList = [2, 6, 3, 10, 4];
$minNum = findMinNum($inputList);
echo $minNum;

function findMinNum($list)
{
    $minNum = $list[0];
    for ($i = 1; $i < count($list); $i++) {
        if ($list[$i] < $minNum) $minNum = $list[$i];
    }
    return $minNum;
}




?>