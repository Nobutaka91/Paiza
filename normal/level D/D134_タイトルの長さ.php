<?php
    $inputWord = trim(fgets(STDIN));
    // substr:文字列の一部分を返す, 0番目から10文字返す
    echo substr($inputWord, 0, 10) . "\n";
    // substr:文字列の一部分を返す, 10番目以降
    echo substr($inputWord, 10);
