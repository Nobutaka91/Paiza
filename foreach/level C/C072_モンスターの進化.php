<?php

    $parameter = explode (" " , rtrim(fgets(STDIN)));
    $ATK = $parameter[0]; //攻撃力
    $DEF = $parameter[1]; //防御力
    $AGI = $parameter[2]; //素早さ
    $N = rtrim(fgets(STDIN)); //進化先のモンスター数

    $evolutions = 0; //進化先のモンスター数
    for ($i = 0; $i < $N; $i ++ ) {
        $evolutionalConditionList[] = explode(" " , rtrim(fgets(STDIN))); //進化の条件リスト
    }

     foreach ( $evolutionalConditionList as $evolutionalCondition){
        $evolutionName = $evolutionalCondition[0]; //進化先のモンスター名

        $MinATK = $evolutionalCondition[1]; //進化に必要な攻撃力の最小
        $MaxATK = $evolutionalCondition[2]; //進化に必要な攻撃力の最大
        $MinDEF = $evolutionalCondition[3]; //進化に必要な防御力の最小
        $MaxDEF = $evolutionalCondition[4]; //進化に必要な防御力の最大
        $MinAGI = $evolutionalCondition[5]; //進化に必要な素早さの最小
        $MaxAGI = $evolutionalCondition[6]; //進化に必要な素早さの最小
        if ($MinATK <= $ATK && $ATK <= $MaxATK) {
            if ($MinDEF <= $DEF && $DEF <= $MaxDEF) {
                if ($MinAGI <= $AGI && $AGI <= $MaxAGI) {
                    echo $evolutionName ."\n";
                    $evolutions ++;
                }
            }
        }
     }

        if ($evolutions === 0 ) {
            echo "no evolution";
        }
