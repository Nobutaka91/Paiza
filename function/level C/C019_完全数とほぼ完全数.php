<?php

    $inputNum = rtrim(fgets(STDIN));

    for ($i = 0; $i < $inputNum; $i ++) {
        $number = rtrim(fgets(STDIN));
        $divisorSum = sumDivisor($number);
        $result = judgePerfectNum($divisorSum, $number);
        echo $result;
        echo "\n";
    }

    function sumDivisor($number)
    {
       $divisorSum = 0;

        for($i = 1; $i <= $number / 2; $i++) {
            if($number % $i == 0) {
                $divisorSum += $i;
            }
        }
        return $divisorSum;
    }

    function judgePerfectNum($divisorSum, $number)
    {
       //早いうちに結果を返却するような書き方を「ガード節」という
        if ($divisorSum == $number) return "perfect";
        if ($divisorSum == ($number - 1)) return "nearly";
        return "neither";
    }
