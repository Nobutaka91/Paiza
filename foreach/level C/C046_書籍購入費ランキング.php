<?php
 
 //エンジニアの人数
 $numberOfPeople = trim(fgets(STDIN));
 
 //エンジニアの名前リスト
 $nameList = explode(" ", trim(fgets(STDIN)));
 
 //書籍を購入したエンジニアの人数
 $numberOfPurchaser = trim(fgets(STDIN));
 
 //書籍の購入者と購入費を紐づけたリスト
 $perchaserToBookfee = [];
 for ($i = 0; $i < $numberOfPurchaser; $i++) {
     [$perchaser, $Bookfee] = explode(" ", trim(fgets(STDIN)));
     $perchaserToBookfee[$perchaser] += $Bookfee;
 } 
 arsort($perchaserToBookfee);
 
 foreach ($perchaserToBookfee as $man => $bookfee) {
     echo $man . "\n";
 }
