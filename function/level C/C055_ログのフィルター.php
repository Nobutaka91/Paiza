<?php

    $ColumnNumber = trim(fgets(STDIN));
    $keyWord = trim(fgets(STDIN));

    for($i = 0;$i < $ColumnNumber;$i++){
        $words[] = trim(fgets(STDIN));
    }

    $result = extractColumn($words, $keyWord);

    echo (!isset($result)) ? "None" : implode("\n", $result);

    function extractColumn($words, $keyWord)
    {
        foreach ($words as $word) {
            if(strpos($word, $keyWord) !== false ) $result[] = $word;
        }
        return $result;
    }
