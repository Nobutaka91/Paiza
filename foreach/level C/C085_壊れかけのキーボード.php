<?php
    //耐久度のリスト
    $durabilityList = explode(" ", trim(fgets(STDIN)));
    
    //アルファベット(a~z)のリスト
    $alphabetList = range('a', 'z');
    
    //アルファベット(a~z)に耐久度を付与する
    $alphabetToDurability = [];
    foreach ($alphabetList as $num => $alphabet) {
        $alphabetToDurability[$alphabet] = $durabilityList[$num];
    }
   
    
    //キーボードで入力したアルファベットのリスト
    $inputKeyList = trim(fgets(STDIN));
    $inputKeyList = str_split($inputKeyList);
    
    
    //耐久度が正なら出力し、0なら出力しない
    $outputKey = [];
    foreach ($inputKeyList as $inputKey) {
        
        if (!empty($alphabetToDurability[$inputKey])) {
            echo $inputKey;
            $alphabetToDurability[$inputKey] -= 1;
        }
    }
