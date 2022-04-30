<?php
    
    $ParentCardNumber = explode(" " ,rtrim(fgets(STDIN)));
    $n = rtrim(fgets(STDIN));
    
    for ($i = 0; $i < $n; $i++ ) {
        $ChildCardNumber = explode(" " ,rtrim(fgets(STDIN)));
        if($ParentCardNumber[0] === $ChildCardNumber[0]) {
            if ($ParentCardNumber[1] < $ChildCardNumber[1]) {
                echo "High" . "\n";
            } else {
                echo "Low"  . "\n";
            }
        } elseif ($ParentCardNumber[0] > $ChildCardNumber[0]) {
                echo "High" . "\n";
        } else {
                echo "Low"  . "\n";
        }
    }
