<?php
   
   for($i = 0; $i < 2; $i++) {
       
    $stringsNum[] = explode(" ", trim(fgets(STDIN)));
    
   }
   
   $string_S = $stringsNum[0];
   $string_T = $stringsNum[1];
   
   $result = compareString($string_S, $string_T);
   echo $result;

   function compareString($S, $T) {
       $result = ( $S == $T ) ? "Yes" : "No";
       return $result;
   }
