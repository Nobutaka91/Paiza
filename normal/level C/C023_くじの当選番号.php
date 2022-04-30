 <?php

    $Winning_Number = explode(" ", rtrim(fgets(STDIN))); //当選番号
    $Raffles_Perchased =  rtrim(fgets(STDIN)); //購入したくじの枚数

    for ($i = 0; $i < $Raffles_Perchased; $i++) {
        $Raffles_Number_Perchased = explode(" ", rtrim(fgets(STDIN))); //購入したくじの番号
        $result = array_intersect($Winning_Number, $Raffles_Number_Perchased);
        echo count($result) . "\n";
    }

?>