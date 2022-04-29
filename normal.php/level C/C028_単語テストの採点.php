<?php

    $total = trim(fgets(STDIN));
    $scoreList = [];
    
    for ($i = 0; $i < $total; $i++) {
        $input_line = trim(fgets(STDIN));
        
        $s = explode(" ", $input_line);
        $correct = $s[0];
        $answer = $s[1];
        
        if ($correct == $answer) {
            $scoreList[] = 2;
        }else {
            if (strlen($correct) == strlen($answer)) {
                $correctS = str_split($correct);
                $answerS = str_split($answer);
                $count = count($correctS);
                
                $mistake = 0;
                for ($j = 0; $j < $count; $j++) {
                    if ($answerS[$j] == $correctS[$j]) {
    
                    }else{
                        $mistake += 1;
                    }
                }
                
                if ($mistake == 1) {
                    $scoreList[] = 1;
                }elseif ($mistake >= 2) {
                    $scoreList[] = 0;
                }
                
            }else{
                $scoreList[] = 0;
            }
        }
    }
    $sum = array_sum($scoreList);
    echo $sum;