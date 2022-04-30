<?php

$wordCount = rtrim(fgets(STDIN));

$stringList = explode(" " , rtrim(fgets(STDIN)));

foreach ($stringList as $string ) {
  $initial = substr($string ,0 ,1);
  echo $initial;
}
