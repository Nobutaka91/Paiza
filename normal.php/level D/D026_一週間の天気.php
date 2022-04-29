<?php
    
     $week = [];
     $days_leave = 0;
    for($i = 0; $i <= 6; $i ++){
         $week[] = rtrim(fgets(STDIN));

         if ($week[$i] == 'no') {
            $days_leave++;
        }
    }
         echo $days_leave;
