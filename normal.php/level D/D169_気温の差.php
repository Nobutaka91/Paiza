<?php
   $input_line = rtrim(fgets(STDIN));
   $input = explode(" " , $input_line );
   $high = $input[0];
   $low = $input[1];
   $output = $high - $low ;
   echo $output;
