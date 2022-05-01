<?php
   
   interface Pollen
   {
       public function judgeDayOutNum() : int;
   }
   
   class pollenForecast  implements Pollen
   {
       const POLLEN_LEVEL_TOLERANCE = 2;
       
       private $pollenLevelList;
       
       public function __construct(array $pollenLevelList)
       {
           $this->pollenLevelList = $pollenLevelList;
       }
       
       public function judgeDayOutNum() : int
       {
            $dayOut = 0;
            foreach($this->pollenLevelList as $pollenLevel) {
               if($pollenLevel <= self::POLLEN_LEVEL_TOLERANCE) {
                   $dayOut ++;
               }
           }
           return $dayOut;
       }
   }

    $pollenLevelList = explode(" " ,rtrim(fgets(STDIN)));
    $pollenForecast = new pollenForecast($pollenLevelList);
    echo $pollenForecast->judgeDayOutNum();
