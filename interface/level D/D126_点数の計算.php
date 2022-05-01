<?php
  
    interface Point 
    {
        public function totalThreePoints() : int;
    }
  
    class ItemsToPoints implements Point
    {
        private $accuracy;
        private $time;
        private $beauty;
        
        public function __construct(array $inputPoints)
        {
            $this->accuracy = $inputPoints[0];
            $this->time     = $inputPoints[1];
            $this->beauty   = $inputPoints[2];
        }
            
        public function totalThreePoints() : int
        {
            return $this->accuracy + $this->time + $this->beauty;
        }
    }
    
    $input = trim(fgets(STDIN));
    $inputPoints = explode(' ' , $input);
    $itemsToPoints = new ItemsToPoints($inputPoints);
    echo $itemsToPoints->totalThreePoints();
