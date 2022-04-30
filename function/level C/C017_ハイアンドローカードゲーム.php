<?php

    $parentCard = explode(" ", trim(fgets(STDIN)));
    $parentCardFirst = $parentCard[0];
    $parentCardSecond = $parentCard[1];
    $count = trim(fgets(STDIN));

    for($i = 0; $i < $count; $i++) {
        $childCard = explode(" ", trim(fgets(STDIN)));
        $childCardFirst = $childCard[0];
        $childCardSecond = $childCard[1];

        $result = compareCardNumber($parentCardFirst, $childCardFirst, $parentCardSecond, $childCardSecond);
        echo $result."\n";
    }

    function compareCardNumber($parentCardFirst, $childCardFirst, $parentCardSecond, $childCardSecond)
    {
        if ($parentCardFirst > $childCardFirst) {
            return "High";
        } elseif ($parentCardFirst == $childCardFirst) {
            if ($parentCardSecond < $childCardSecond) {
                return "High";
            } else {
                return "Low";
            }
        } else {
            return "Low";
        }
    }

##############################
# [別解]foreachと連想配列を使用
##############################

    [$parent1, $parent2] = explode(" ", trim(fgets(STDIN)));

    $parentCard = [
        "one" => $parent1,
        "two" => $parent2
    ];

    $num = trim(fgets(STDIN));

    for($i = 0; $i < $num; $i++) {
        [$child1, $child2] = explode(" ", trim(fgets(STDIN)));

        $childCardList[] = [
            "one" => $child1,
            "two" => $child2
        ];
    }

    foreach($childCardList as $childCard) {
        $result[] = compareCardNum($childCard, $parentCard);
    }
    echo implode("\n", $result);

    function compareCardNum($childCard, $parentCard)
    {
        if($parentCard["one"] > $childCard["one"]) {
            return "High";
        } elseif ($parentCard["one"] === $childCard["one"]) {
            if ($parentCard["two"] < $childCard["two"]) {
                return "High";
            } else {
                return "Low";
            }
        } else {
            return "Low";
        }
    }


    ##################
    # 変数名を良くする
    ##################

    $parentCard = explode(" ", trim(fgets(STDIN)));
    $parentCardFirst = $parentCard[0];
    $parentCardSecond = $parentCard[1];
    $count = trim(fgets(STDIN));

    for($i = 0; $i < $count; $i++) {
        $childCard = explode(" ", trim(fgets(STDIN)));
        $childCardFirst = $childCard[0];
        $childCardSecond = $childCard[1];

        $result = compareCardNumb($parentCardFirst, $childCardFirst, $parentCardSecond, $childCardSecond);
        echo $result."\n";
    }

    function compareCardNumb($parentCardFirst, $childCardFirst, $parentCardSecond, $childCardSecond)
    {
        if ($parentCardFirst > $childCardFirst) return "High";
        if ($parentCardFirst == $childCardFirst) return ($parentCardSecond < $childCardSecond) ?  "High" : "Low";
        return "Low";
    }

?>
