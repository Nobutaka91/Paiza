<?php

    $balance = trim(fgets(STDIN));
    $result = addMoney($balance);
    echo $result;

    function addMoney($balance) {
    $result = ($balance < 10000) ? $balance += 10000 :  $balance;
    return $result;
    }
