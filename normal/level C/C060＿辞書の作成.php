<?php

    [$numberOfAnimalWords, $NumberOfPage, $targetPage] = explode(" ", trim(fgets(STDIN)));
    $animalWordsList = explode(" ", trim(fgets(STDIN)));

    //$animalWordsListをアルファベット順に並び替える
    sort($animalWordsList);

    //$animalWordsListを小分けにして配列に格納する
    $numberOfWordsPerOnePage = ceil($numberOfAnimalWords / $NumberOfPage);
    $dividedAnimalWordsList = array_chunk($animalWordsList, $numberOfWordsPerOnePage);

    //配列の$targetPage番目を出力する
    foreach( $dividedAnimalWordsList[$targetPage - 1] as $animal) {
        echo $animal . "\n";
    };
